<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Http\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ResponseTrait;
 public function login(){
    return view('admin.pages.login');
 }
     public function adminLoginAction(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
//            'recaptcha_token' => ['required', new ReCaptcha],
        ]);
        if ($validator->fails()) {
            return $this->sendValidationError($validator->errors());
        }
        $rememberToken = $request->has('remember_me') ? true : false;
        if (Auth::guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $rememberToken)) {

            return $this->sendSuccess(__('Login successful'));
        } else {
            return $this->sendError(__('Invalid email or password'));
        }
    }
    public function dashboard()
    {
        return view('admin.pages.dashboard');
    }
}
