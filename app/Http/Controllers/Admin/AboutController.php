<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Traits\ResponseTrait;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
use ResponseTrait;
public function about(){
    $about=About::first();
    return view('admin.pages.about',compact('about'));
}
public function update(Request $request)
{

    $validator = Validator::make(
    $request->all(),
    [
        'id' => 'required',
        'title' => 'required|string|max:255',
        'subtitle' => 'required|string|max:255',
        'description' => 'required|string',
        'experience' => 'required',
        'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        'upload_cv' => 'nullable|mimes:pdf,doc,docx',
    ],
    [

        // ID
        'id.required' => 'About record ID is required.',

        // Title
        'title.required' => 'Title is required.',
        'title.string' => 'Title must be a valid string.',
        'title.max' => 'Title must not exceed 255 characters.',

        // Subtitle
        'subtitle.required' => 'Subtitle is required.',
        'subtitle.string' => 'Subtitle must be a valid string.',
        'subtitle.max' => 'Subtitle must not exceed 255 characters.',

        // Description
        'description.required' => 'Description is required.',
        'description.string' => 'Description must be a valid text.',

        // Experience
        'experience.required' => 'Experience field is required.',

        // Profile Image
'profile_image.max' => 'Profile image size must not exceed 2MB.',
'profile_image.uploaded' => 'Profile image failed to upload.',

        // CV Upload
        'upload_cv.mimes' => 'CV must be a PDF, DOC, or DOCX file.',
        'upload_cv.max' => 'CV file size must not exceed 2MB.',
    ]
);

    if ($validator->fails()) {
        return $this->sendValidationError($validator->errors());
    }

    try {

        DB::beginTransaction();

        $about = About::find($request->id);

        /*
        |--------------------------------------------------------------------------
        | Profile Image Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('profile_image')) {

            if ($about->profile_image && Storage::disk('public')->exists($about->profile_image)) {
                Storage::disk('public')->delete($about->profile_image);
            }

            $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');

            $about->profile_image = $profileImagePath;
        }

        /*
        |--------------------------------------------------------------------------
        | CV Upload
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('upload_cv')) {

            if ($about->upload_cv && Storage::disk('public')->exists($about->upload_cv)) {
                Storage::disk('public')->delete($about->upload_cv);
            }

            $cvPath = $request->file('upload_cv')->store('cv_files', 'public');

            $about->resume_file = $cvPath;
        }

        $about->title = $request->title;
        $about->subtitle = $request->subtitle;
        $about->description = $request->description;
       $about->experience_years = $request->experience;

        $about->save();

        DB::commit();

        return $this->sendSuccess('About updated successfully.');

    } catch (\Exception $e) {

        DB::rollBack();

        return $this->sendError($e->getMessage());

    }

}
}
