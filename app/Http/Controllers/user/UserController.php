<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\About;
use App\Http\Traits\ResponseTrait;
use Illuminate\Support\Facades\Validator;
use App\Models\Testimonial;
use App\Models\Service;
use App\Models\Project;

class UserController extends Controller
{
    use ResponseTrait;

    public function getAboutData()
    {
        $about = About::first();

        if (!$about) {
            return $this->sendError('About data not found', 404);
        }

        return $this->sendResponse('About Data Fetched Successfully', $about, 200);
    }

    public function downloadResume()
    {
        $about = About::first();
        if (!$about || !$about->resume_file) {
            abort(404, 'Resume not found');
        }
        $filePath = storage_path('app/public/' . $about->resume_file);
        return response()->download($filePath, 'Om_Jasoliya_Resume.pdf');
    }

    public function contactPage()
    {
        return view('user.contact');
    }

    public function aboutPage()
    {
        return view('user.about');
    }

    public function servicesPage()
    {
        return view('user.services');
    }

    public function worksPage()
    {
        return view('user.works');
    }

    public function sendContactData(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors());
        }

        $contact = Contact::create($validator->validated());

        return $this->sendResponse(
            "Thanks for reaching out! I'll respond to your message shortly.",
            $contact,
            200
        );
    }

    public function getTestimonials()
    {
        $testimonials = Testimonial::all();
        if (!$testimonials) {
            return $this->sendError("Testimonials not found", 404);
        }
        return $this->sendResponse('Testimonials Fetched Successfully', $testimonials, 200);
    }

    public function getServices()
    {
        $services = Service::all();
        if (!$services) {
            return $this->sendError("Services not found", 404);
        }
        return $this->sendResponse('Services Fetched Successfully', $services, 200);
    }

    public function getProjects()
    {
        $projects = Project::all();
        if (!$projects) {
            return $this->sendError("Projects not found", 404);
        }
        return $this->sendResponse('Projects Fetched Successfully', $projects, 200);
    }
}