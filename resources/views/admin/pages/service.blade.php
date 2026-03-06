@extends('admin.master')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css" />
    <style>
        /* Modern Table Wrapper Alignment */
        .dataTables_wrapper .row:first-child {
            padding-bottom: 1rem;
            align-items: center;
        }

        .dataTables_length select {
            border-radius: 4px;
            padding: 4px 8px;
            margin: 0 5px;
        }

        .dataTables_filter input {
            border-radius: 4px;
            padding: 5px 10px;
            border: 1px solid #ced4da;
            margin-left: 10px;
        }

        /* Description Column Sizing */
        #servicesTable td:nth-child(5) {
            max-width: 300px;
            white-space: normal;
            word-wrap: break-word;
            font-size: 0.85rem;
            color: #adb5bd;
        }

        /* Modal Refinement */
        .modal-content {
            border: none;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .modal-header {
            border-bottom: 1px solid #32383e;
            padding: 1rem 1.5rem;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .form-control {
            background-color: #2a2f34;
            border: 1px solid #363c42;
            color: #fff;
            padding: 0.6rem 0.75rem;
        }

        .form-control:focus {
            background-color: #2d3339;
            border-color: #405189;
            color: #fff;
            box-shadow: none;
        }
    </style>
@endpush

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-dashed">
                    <h5 class="card-title mb-0">Services List</h5>
                    <button class="btn btn-success add-btn" id="createNewService">
                        <i class="ri-add-line align-bottom me-1"></i> Add Service
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="servicesTable" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 50px;">ID</th>
                                    <th style="width: 60px;">S.No</th>
                                    <th style="width: 60px;">Icon</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th style="width: 150px;">Created</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ajaxModelexa" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="modelHeading"></h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="serviceForm" name="serviceForm">
                        <input type="hidden" name="id" id="service_id">
                        <div class="mb-3">
                            <label for="title" class="form-label">Service Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                placeholder="e.g. Web Development" required>
                            <span id="title-error" class="text-danger"></span>
                        </div>
                        <div class="mb-3">
                            <label for="icon" class="form-label">Icon Class</label>
                            <div class="input-group">
                                <span class="input-group-text bg-transparent border-end-0 text-muted"><i
                                        class="ri-remixicon-line"></i></span>
                                <input type="text" class="form-control border-start-0" id="icon" name="icon"
                                    placeholder="ri-service-line" required>
                            </div>
                            <span id="icon-error" class="text-danger"></span>
                            <small class="text-muted mt-1 d-block">Browse icons at <a href="https://remixicon.com/"
                                    target="_blank" class="text-info">remixicon.com</a></small>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" rows="4" required
                                placeholder="Describe the service..." class="form-control"></textarea>
                            <span id="description-error" class="text-danger"></span>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary px-4" id="saveBtn">Save Service</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function () {
            // Setup CSRF Token
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize DataTable
            var table = $('#servicesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.services.data') }}",
                columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'icon',
                    name: 'icon',
                    orderable: false,
                    searchable: false,
                    className: 'text-center'
                },
                {
                    data: 'title',
                    name: 'title',
                    className: 'fw-medium'
                },
                {
                    data: 'description',
                    name: 'description'
                },
                {
                    data: 'created_at',
                    name: 'created_at'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ services",
                    paginate: {
                        next: '<i class="ri-arrow-right-s-line"></i>',
                        previous: '<i class="ri-arrow-left-s-line"></i>'
                    }
                }
            });

            // Validation and Submit
            $("#serviceForm").validate({
                ignore: [],
                errorClass: "text-danger",
                rules: {
                    title: {
                        required: true,
                    },
                    icon: {
                        required: true,
                    },
                    description: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Title is required",
                    },
                    icon: {
                        required: "Icon is required",
                    },
                    description: {
                        required: "Description is required",
                    },
                },
                errorPlacement: function (error, element) {
                    let name = element.attr("name");
                    $("#" + name + "-error").html(error);
                },
                submitHandler: function (form) {
                    let formData = new FormData(form);
                    $('#saveBtn').html('<i class="ri-loader-4-line ri-spin align-middle me-1"></i> Saving...');

                    $.ajax({
                        url: "{{ route('admin.services.store') }}",
                        type: "POST",
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function (response) {
                            $('#ajaxModelexa').modal('hide');
                            sendSuccess(response.message);
                            table.draw();
                            $('#saveBtn').html('Save Service');
                        },
                        error: function (xhr) {
                            let res = xhr.responseJSON;
                            $('.text-danger').html('');
                            if (res.error) {
                                $.each(res.error, function (key, value) {
                                    $("#" + key + "-error").html(value[0]);
                                });
                            }
                            $('#saveBtn').html('Save Service');
                        }
                    });
                }
            });

            // Add New
            $('#createNewService').click(function () {
                $('#service_id').val('');
                $('#serviceForm').trigger("reset");
                $('.text-danger').html('');
                $('#modelHeading').html(
                    '<i class="ri-add-circle-line align-middle me-1"></i> Add New Service');
                $('#saveBtn').html('Create Service');
                $('#ajaxModelexa').modal('show');
            });

            // Edit
            $('body').on('click', '.edit-item-btn', function () {
                var service_id = $(this).data('id');
                $('.text-danger').html('');
                $.get("{{ url('admin/services/edit') }}" + '/' + service_id, function (data) {
                    $('#modelHeading').html(
                        '<i class="ri-edit-box-line align-middle me-1"></i> Edit Service');
                    $('#saveBtn').html('Update Service');
                    $('#ajaxModelexa').modal('show');
                    $('#service_id').val(data.id);
                    $('#title').val(data.title);
                    $('#icon').val(data.icon);
                    $('#description').val(data.description);
                })
            });

            // Delete
            $('body').on('click', '.remove-item-btn', function () {
                var service_id = $(this).data("id");

                Swal.fire({
                    title: 'Delete Service?',
                    text: "This action cannot be undone.",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#f06548',
                    cancelButtonColor: '#212529',
                    confirmButtonText: 'Yes, Delete it'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('admin.services.delete') }}",
                            data: {
                                id: service_id
                            },
                            success: function (response) {
                                table.draw();
                                sendSuccess(response.message);
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection