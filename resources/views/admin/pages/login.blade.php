<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('admin.layouts.header-links')
</head>

<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-5">

            <div class="card">
                <div class="card-body">

                    <h4 class="text-center mb-4">Admin Login</h4>

                    <form id="loginForm">
                        @csrf

                        <!-- Email -->
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control">
                            <span class="text-danger" id="email-error"></span>
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label>Password</label>

                            <div class="position-relative">
                                <input type="password"
                                       name="password"
                                       class="form-control pe-5"
                                       id="passwordInput">

                                <button type="button"
                                        class="btn btn-link position-absolute end-0 top-0 btn-password-toggle">
                                    <i class="ri-eye-fill"></i>
                                </button>
                            </div>

                            <span class="text-danger" id="password-error"></span>
                        </div>

                        <!-- Remember -->
                        <div class="form-check mb-3">
                            <input type="checkbox" name="remember" class="form-check-input">
                            <label class="form-check-label">Remember Me</label>
                        </div>

                        <!-- Button -->
                        <button type="submit" class="btn btn-primary w-100" id="loginBtn">
                            <span id="spinner"
                                  class="spinner-border spinner-border-sm me-2"
                                  style="display:none;"></span>
                            Login
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@include('admin.layouts.footer-links')

<script>
$(document).ready(function () {

    // =========================
    // Password Show / Hide
    // =========================
    $(document).on('click', '.btn-password-toggle', function () {

        let input = $('#passwordInput');
        let icon = $(this).find('i');

        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            icon.removeClass('ri-eye-fill').addClass('ri-eye-off-fill');
        } else {
            input.attr('type', 'password');
            icon.removeClass('ri-eye-off-fill').addClass('ri-eye-fill');
        }

    });


    // =========================
    // jQuery Validation + AJAX
    // =========================
    $("#loginForm").validate({

        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },

        messages: {
            email: {
                required: "Email is required",
            },
            password: {
                required: "Password is required"
            }
        },

        errorClass: "text-danger",
        errorElement: "span",

        errorPlacement: function (error, element) {
            element.closest('.mb-3').append(error);
        },

        submitHandler: function (form) {

            $.ajax({
                url: "{{ route('admin.login-action') }}",
                method: "POST",
                data: $(form).serialize(),

                beforeSend: function () {
                    $('#loginBtn').attr('disabled', true);
                    $('#spinner').show();
                    $('.text-danger').html('');
                },

                success: function (response) {

                    if (response.status) {
                        window.location.href = route('admin.dashboard');
                    }

                },

                error: function (xhr) {

                    if (xhr.responseJSON && xhr.responseJSON.errors) {

                        let errors = xhr.responseJSON.errors;

                        if (errors.email) {
                            $('#email-error').html(errors.email[0]);
                        }

                        if (errors.password) {
                            $('#password-error').html(errors.password[0]);
                        }
                    }

                },

                complete: function () {
                    $('#loginBtn').attr('disabled', false);
                    $('#spinner').hide();
                }

            });

        }

    });

});
</script>

</body>
</html>
