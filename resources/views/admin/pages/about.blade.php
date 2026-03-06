@extends('admin.master')

@section('main')

    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">About</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin.dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <form method="POST" id="frmabout" enctype="multipart/form-data" class="card p-4 shadow-sm">

                        @csrf
<input type="hidden" name="id" value="{{ $about->id }}">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" value="{{ $about->title ?? '' }}" class="form-control">
                            <span id="title-error" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sub Title</label>
                            <input type="text" name="subtitle" value="{{ $about->subtitle ?? '' }}" class="form-control">
                            <span id="subtitle-error" class="text-danger"></span>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" rows="4"
                                class="form-control">{{ $about->description ?? '' }}</textarea>
                            <span id="description-error" class="text-danger"></span>
                        </div>
      <div class="mb-3">
                            <label class="form-label">Experienc</label>
                            <input type="text" name="experience" value="{{ $about->experience_years ?? '' }}" class="form-control">
                            <span id="experience-error" class="text-danger"></span>
                        </div>
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mb-3">
                                <label class="form-label">Profile Image</label>
                                <input type="file" name="profile_image" class="form-control profile_image_input">
                                <div class="mt-2">
                                <img src="{{ $about->profile_image ? asset('storage/'.$about->profile_image) : '' }}"
                                    class="img-thumbnail profile-image"
                                style="height:100px;width:100px;object-fit:cover;border-radius:50%;">
                                </div>
                                <span id="profile_image-error" class="text-danger"></span>
                            </div>
                        </div>

                            <div class="col-lg-6">
    <div class="mb-3">

        <label class="form-label">Upload CV</label>

        <input type="file"
               name="upload_cv"
               class="filepond"
               id="upload_cv"
               accept=".pdf,.doc,.docx">

        @if($about->resume_file)

        <div class="mt-2">

            <a href="{{ asset('storage/'.$about->resume_file) }}"
               class="btn btn-sm btn-success"
               download>

               Download Current CV

            </a>

        </div>

        @endif

        <span id="upload_cv-error" class="text-danger"></span>

    </div>
</div>

                        </div>

                </div>


                <div class="text-center mb-3">
                    <button type="submit" class="btn btn-primary">
                        Save Settings
                    </button>
                </div>

                </form>

            </div>
        </div>
    </div>
    </div>

@endsection
@section('script')
   <script>
    
$(document).ready(function () {

    const inputElement = document.querySelector('#upload_cv');

if (inputElement) {
    FilePond.create(inputElement, {
        allowMultiple: false,
        storeAsFile: true,   // ⭐ important

        acceptedFileTypes: [
            'application/pdf',
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
        ],

        labelIdle: 'Drag & Drop your CV or <span class="filepond--label-action">Browse</span>'
    });
}
    $("#frmabout").validate({

        ignore: [],

        errorClass: "text-danger",

        rules: {
            title: {
                required: true,
           
            },

            subtitle: {
                required: true,
              
            },

            description: {
                required: true,
             
            },
   experience: {
                required: true,
             
            },
            profile_image: {
                extension: "jpg|jpeg|png"
            },

            upload_cv: {
                extension: "pdf|doc|docx"
            }
        },

        messages: {

            title: {
                required: "Title is required",
            },

            subtitle: {
                required: "Subtitle is required",
            },

            description: {
                required: "Description is required",
            },

            profile_image: {
                extension: "Only JPG, JPEG, PNG images allowed"
            },

            upload_cv: {
                extension: "Only PDF, DOC, DOCX files allowed"
            }
        },

        errorPlacement: function (error, element) {

            let name = element.attr("name");

            $("#" + name + "-error").html(error);

        },

        submitHandler: function (form) {

            let formData = new FormData(form);

            $.ajax({

                url: "{{ route('admin.about.update') }}",
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,

                success: function (response) {

                    sendSuccess(response.message);

                    setTimeout(() => {
                        location.reload();
                    }, 1500);

                },

                error: function (xhr) {

                    let res = xhr.responseJSON;

    $('.text-danger').html('');
    if (res.error) {

        $.each(res.error, function (key, value) {

            $("#" + key + "-error").html(value[0]);

        });

    }

}
            });

        }

    });

});
</script>
@endsection