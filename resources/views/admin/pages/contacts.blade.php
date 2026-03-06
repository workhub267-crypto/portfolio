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

        /* Message Column Sizing */
        #contactsTable td:nth-child(6) {
            max-width: 250px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
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
    </style>
@endpush

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-dashed">
                    <h5 class="card-title mb-0">Messages List</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="contactsTable" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width: 50px;">ID</th>
                                    <th style="width: 60px;">S.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th style="width: 100px;">Status</th>
                                    <th style="width: 150px;">Received At</th>
                                    <th style="width: 100px;">Action</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- View Modal -->
    <div class="modal fade" id="viewContactModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="ri-mail-open-line align-middle me-1"></i> View Message</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="text-muted mb-1">From</label>
                            <h6 id="view_name" class="text-white"></h6>
                        </div>
                        <div class="col-md-6">
                            <label class="text-muted mb-1">Email</label>
                            <h6 id="view_email" class="text-info"></h6>
                        </div>
                        <div class="col-12">
                            <hr class="border-secondary op-25">
                            <label class="text-muted mb-1">Subject</label>
                            <h6 id="view_subject" class="text-warning"></h6>
                        </div>
                        <div class="col-12">
                            <label class="text-muted mb-1">Message</label>
                            <div id="view_message" class="p-3 bg-light bg-opacity-10 rounded text-light"
                                style="white-space: pre-wrap; font-size: 0.95rem;"></div>
                        </div>
                        <div class="col-12 text-end">
                            <small id="view_date" class="text-muted"></small>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-top border-secondary op-25">
                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                    <a id="reply_email" href="#" class="btn btn-primary px-4"><i
                            class="ri-reply-line align-middle me-1"></i> Reply</a>
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
            var table = $('#contactsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.contacts.data') }}",
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    { data: 'name', name: 'name', className: 'fw-medium' },
                    { data: 'email', name: 'email' },
                    { data: 'subject', name: 'subject' },
                    { data: 'message', name: 'message' },
                    { data: 'is_read', name: 'is_read', className: 'text-center' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ],
                language: {
                    search: "Search:",
                    lengthMenu: "Show _MENU_ entries",
                    info: "Showing _START_ to _END_ of _TOTAL_ messages",
                    paginate: {
                        next: '<i class="ri-arrow-right-s-line"></i>',
                        previous: '<i class="ri-arrow-left-s-line"></i>'
                    }
                },
                order: [[0, 'desc']] // Show latest first
            });

            // View Message
            $('body').on('click', '.view-contact-btn', function () {
                var contact_id = $(this).data('id');
                $.get("{{ url('admin/contacts/show') }}" + '/' + contact_id, function (data) {
                    $('#view_name').text(data.name);
                    $('#view_email').text(data.email);
                    $('#view_subject').text(data.subject || 'No Subject');
                    $('#view_message').text(data.message);
                    $('#view_date').text('Received on: ' + new Date(data.created_at).toLocaleString());
                    $('#reply_email').attr('href', 'mailto:' + data.email);

                    $('#viewContactModal').modal('show');
                    table.draw(false); // Refresh status in table
                })
            });

            // Delete Message
            $('body').on('click', '.remove-contact-btn', function () {
                var contact_id = $(this).data("id");

                Swal.fire({
                    title: 'Delete Message?',
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
                            url: "{{ route('admin.contacts.delete') }}",
                            data: { id: contact_id },
                            success: function (data) {
                                table.draw();
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: data.message,
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection