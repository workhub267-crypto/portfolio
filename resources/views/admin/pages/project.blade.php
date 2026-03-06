@extends('admin.master')

@push('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <style>
        .project-img-preview {
            width: 80px;
            height: 50px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #333;
        }

        .status-badge {
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            border-radius: 4px;
            font-weight: 600;
        }

        .badge-completed {
            background: #28a745;
            color: #fff;
        }

        .badge-ongoing {
            background: #ffc107;
            color: #000;
        }

        .badge-active {
            background: #007bff;
            color: #fff;
        }

        .badge-inactive {
            background: #6c757d;
            color: #fff;
        }
    </style>
@endpush

@section('main')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div
                    class="card-header d-flex justify-content-between align-items-center bg-transparent border-bottom-dashed">
                    <h5 class="card-title mb-0">Projects Management</h5>
                    <button class="btn btn-primary add-btn" id="createNewProject">
                        <i class="ri-add-line align-bottom me-1"></i> Add Project
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle" id="projectsTable" style="width:100%">
                            <thead class="table-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Tech Stack</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="projectModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-dark text-white">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalHeading">Add New Project</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="projectForm" name="projectForm" enctype="multipart/form-data">
                        <input type="hidden" name="project_id" id="project_id">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="title" class="form-label">Project Title</label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-control" id="status" name="status" required>
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                    <option value="completed">Completed</option>
                                    <option value="ongoing">Ongoing</option>
                                </select>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="tech_stack" class="form-label">Tech Stack (comma separated)</label>
                                <input type="text" class="form-control" id="tech_stack" name="tech_stack"
                                    placeholder="Laravel, Vue.js, Tailwind">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="github_link" class="form-label">GitHub Link</label>
                                <input type="url" class="form-control" id="github_link" name="github_link">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="live_link" class="form-label">Live Link</label>
                                <input type="url" class="form-control" id="live_link" name="live_link">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="image" class="form-label">Project Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                <div id="image_preview_box" class="mt-2" style="display:none;">
                                    <img id="image_preview" src="" class="project-img-preview">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 text-end">
                            <button type="button" class="btn btn-light me-2" data-bs-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary px-4" id="saveBtn">Save Project</button>
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
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });

            var table = $('#projectsTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.projects.data') }}",
                columns: [
                    { data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false },
                    {
                        data: 'image',
                        name: 'image',
                        orderable: false,
                        searchable: false,
                        render: function (data) {
                            if (data) return `<img src="/storage/${data}" class="project-img-preview">`;
                            return `<div class="bg-secondary text-center text-white project-img-preview d-flex align-items-center justify-content-center">NONE</div>`;
                        }
                    },
                    { data: 'title', name: 'title' },
                    {
                        data: 'status',
                        name: 'status',
                        render: function (data) {
                            return `<span class="status-badge badge-${data}">${data.toUpperCase()}</span>`;
                        }
                    },
                    { data: 'tech_stack', name: 'tech_stack' },
                    { data: 'action', name: 'action', orderable: false, searchable: false }
                ]
            });

            $('#createNewProject').click(function () {
                $('#project_id').val('');
                $('#projectForm').trigger("reset");
                $('#image_preview_box').hide();
                $('#modalHeading').html("Add New Project");
                $('#projectModal').modal('show');
            });

            $('body').on('click', '.editProject', function () {
                var project_id = $(this).data('id');
                $.get("{{ url('admin/projects/edit') }}" + '/' + project_id, function (response) {
                    if (response.status) {
                        $('#modalHeading').html("Edit Project");
                        $('#projectModal').modal('show');
                        $('#project_id').val(response.data.id);
                        $('#title').val(response.data.title);
                        $('#status').val(response.data.status);
                        $('#description').val(response.data.description);
                        $('#tech_stack').val(response.data.tech_stack);
                        $('#github_link').val(response.data.github_link);
                        $('#live_link').val(response.data.live_link);
                        if (response.data.image) {
                            $('#image_preview').attr('src', '/storage/' + response.data.image);
                            $('#image_preview_box').show();
                        } else {
                            $('#image_preview_box').hide();
                        }
                    }
                })
            });

            $('#projectForm').submit(function (e) {
                e.preventDefault();
                var formData = new FormData(this);
                $('#saveBtn').prop('disabled', true).html('Saving...');

                $.ajax({
                    url: "{{ route('admin.projects.store') }}",
                    type: "POST",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {
                        if (response.status) {
                            $('#projectModal').modal('hide');
                            sendSuccess(response.message);
                            table.draw();
                        } else {
                            // handle errors
                        }
                        $('#saveBtn').prop('disabled', false).html('Save Project');
                    }
                });
            });

            $('body').on('click', '.deleteProject', function () {
                var id = $(this).data("id");
                if (confirm("Are you sure you want to delete?")) {
                    $.post("{{ route('admin.projects.delete') }}", { id: id }, function (response) {
                        table.draw();
                        sendSuccess(response.message);
                    });
                }
            });
        });
    </script>
@endsection