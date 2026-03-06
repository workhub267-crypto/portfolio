<!DOCTYPE html>
<html class="no-js" lang="en">

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Contact - Epitome</title>
    <meta name="description" content="Get in touch with me for your next project.">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @include('user.layouts.header-links')

    <style>
        .subheading {
            color: #ffffff !important;
            font-family: "Roboto", sans-serif;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5rem;
            margin-bottom: 2rem;
            display: block;
        }

        .subheading-text {
            color: #ffffff !important;
            text-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
        }

        .s-contact-page {
            padding-top: 15rem;
            padding-bottom: 12rem;
            background: radial-gradient(circle at 100% 100%, #1a1a1a 0%, #050505 100%);
            color: rgba(255, 255, 255, 0.5);
            position: relative;
            overflow: hidden;
        }

        .contact-form-wrap {
            background: rgba(255, 255, 255, 0.02);
            padding: 6rem;
            border-radius: 30px;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            box-shadow: 0 40px 100px rgba(0, 0, 0, 0.5);
            position: relative;
            z-index: 2;
        }

        .contact-form-wrap h2 {
            color: #ffffff;
            font-family: "Frank Ruhl Libre", serif;
            font-size: 4rem;
            margin-top: 0;
            margin-bottom: 4rem;
            letter-spacing: -0.02em;
        }

        .contact-form input,
        .contact-form textarea {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #ffffff;
            width: 100%;
            padding: 2rem 2.5rem;
            margin-bottom: 3rem;
            border-radius: 12px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            font-size: 1.6rem;
            font-family: "Roboto", sans-serif;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            background: rgba(255, 255, 255, 0.06);
            border-color: #cf1767;
            box-shadow: 0 0 20px rgba(207, 23, 103, 0.2);
            outline: none;
            transform: translateY(-2px);
        }

        .contact-form .btn--primary {
            background: linear-gradient(135deg, #cf1767 0%, #ff3b8e 100%);
            border: none;
            color: #ffffff;
            letter-spacing: .3rem;
            text-transform: uppercase;
            font-weight: 700;
            width: 100%;
            height: 7rem;
            border-radius: 12px;
            transition: all 0.4s ease;
            box-shadow: 0 10px 30px rgba(207, 23, 103, 0.3);
        }

        .contact-form .btn--primary:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(207, 23, 103, 0.5);
        }

        .contact-info-list {
            list-style: none;
            margin-left: 0;
            padding-left: 0;
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }

        .contact-info-list li {
            background: rgba(255, 255, 255, 0.02);
            padding: 3.5rem;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
        }

        .contact-info-list li:hover {
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(207, 23, 103, 0.3);
            transform: translateX(10px);
        }

        .contact-info-list h5 {
            color: #cf1767;
            margin-bottom: 1.5rem;
            text-transform: uppercase;
            letter-spacing: 0.3rem;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .contact-info-list p,
        .contact-info-list a {
            font-size: 1.8rem;
            color: rgba(255, 255, 255, 0.8);
            margin: 0;
        }

        .contact-info-list a:hover {
            color: #cf1767;
        }

        .s-header {
            background-color: rgba(5, 5, 5, 0.9) !important;
            backdrop-filter: blur(20px);
        }

        @media screen and (max-width: 800px) {
            .contact-form-wrap {
                padding: 4rem 3rem;
            }

            .s-contact-page {
                padding-top: 12rem;
            }

            .contact-info-list li:hover {
                transform: none;
            }
        }
    </style>
</head>

<body id="top">

    <div id="preloader">
        <div id="loader"></div>
    </div>

    <!-- site header
    ================================================== -->
    @include('user.layouts.header')

    <!-- contact page content
    ================================================== -->
    <section class="s-contact-page">

        <div class="row section-header" data-aos="fade-up">
            <div class="column large-full">
                <h3 class="subheading">Hire Me</h3>
                <h1 class="display-1 subheading-text">Let's build something incredible together.</h1>
            </div>
        </div>

        <div class="row">
            <div class="column large-7 tab-full" data-aos="fade-up">
                <div class="contact-form-wrap">
                    <h2>Send Me A Message</h2>
                    <form id="contactForm" class="contact-form">
                        @csrf
                        <div>
                            <input name="name" type="text" id="contactName" placeholder="Your Name" value=""
                                minlength="2" required="">
                        </div>
                        <div>
                            <input name="email" type="email" id="contactEmail" placeholder="Your Email" value=""
                                required="">
                        </div>
                        <div>
                            <input name="subject" type="text" id="contactSubject" placeholder="Subject" value="">
                        </div>
                        <div>
                            <textarea name="message" id="contactMessage" placeholder="Your Message" rows="10" cols="50"
                                required=""></textarea>
                        </div>
                        <div>
                            <button type="submit" class="submit btn btn--primary full-width">Submit</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="column large-4 tab-full contact-info" data-aos="fade-up">
                <ul class="contact-info-list">
                    <li>
                        <h5>Where to Find Me</h5>
                        <p>
                            1600 Amphitheatre Parkway<br>
                            Mountain View, CA<br>
                            94043 US
                        </p>
                    </li>
                    <li>
                        <h5>Email Me At</h5>
                        <p>
                            <a href="mailto:hello@epitome.com">hello@epitome.com</a><br>
                            <a href="mailto:support@epitome.com">support@epitome.com</a>
                        </p>
                    </li>
                    <li>
                        <h5>Call Me At</h5>
                        <p>
                            Phone: (+63) 555 1212<br>
                            Mobile: (+63) 555 0100<br>
                            Fax: (+63) 555 0101
                        </p>
                    </li>
                </ul>
            </div>
        </div>

    </section>

    <!-- footer
    ================================================== -->
    @include('user.layouts.footer')
    @include('user.layouts.footer-links')
    @include('admin.layouts.common-js')
    {{-- success: function (response) {

    if (response.status) {

    $('#contactForm')[0].reset();

    Toastify({
    text: `
    <div style="display:flex; align-items:center; gap:12px;">
        <div style="
                                    width:35px;
                                    height:35px;
                                    border-radius:50%;
                                    background:#cf1767;
                                    display:flex;
                                    align-items:center;
                                    justify-content:center;
                                    font-weight:bold;
                                    color:white;
                                ">
            ✓
        </div>
        <div>
            <div style="font-weight:600; font-size:14px;">
                ${response.message}
            </div>

        </div>
    </div>
    `,
    duration: 2000,
    gravity: "top",
    position: "right",
    close: false,
    escapeMarkup: false,
    stopOnFocus: true,
    style: {
    background: "rgba(20,20,20,0.95)",
    border: "1px solid #cf1767",
    borderRadius: "10px",
    boxShadow: "0 10px 25px rgba(0,0,0,0.4)",
    padding: "16px",
    minWidth: "320px"
    }
    }).showToast();
    }
    } --}}
</body>
<script>
    $(document).ready(function () {
        $('#contactForm').submit(function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            $.ajax({
                url: "{{ route('user.contact') }}",
                method: "POST",
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    if (response.status) {
                        $('#contactForm')[0].reset();
                        sendToast(response.message, 'success', 'top', 'right', 2000);
                    }
                }

            });
        })
    })
</script>

</html>