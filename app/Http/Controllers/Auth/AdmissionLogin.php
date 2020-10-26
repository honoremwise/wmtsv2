<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionLogin extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admission')->except('logout');
    }
    public function showLoginForm()
    {
      return view('auth.admissionofficer');
    }

    public function login(Request $request)
    {
      // handle form login data submitted here
      $this->validate($request,[
        'email'=>'required|email',
        'password'=>'required|min:8',
      ],[
        'password.min'=>'Password is to short',
      ]);
      $where = array('email' =>$request->email,'password'=>$request->password,'role_id'=>'3');
      if (Auth::guard('admission')->attempt($where)){
        return redirect()->intended(route('admissionofficer'));
      }
      $errors = array('password' =>'Invalid credentials');
      return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
    }
    public function logout()
    {
      Auth::guard('admission')->logout();
      return redirect()
        ->route('admission.login');
    }
}
