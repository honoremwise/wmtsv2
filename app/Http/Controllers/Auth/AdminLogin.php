<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
class AdminLogin extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
      #display registror login form
      return view('auth.adminlogin');
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
      $where = array('email' =>$request->email,'password'=>$request->password,'role_id'=>'1');
      if (Auth::guard('admin')->attempt($where)){
        return redirect()->intended(route('admin.dashboard'));
      }
      $errors = array('password' =>'Invalid credentials');
      return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
    }
    public function logout()
    {
      Auth::guard('admin')->logout();
      return redirect()
        ->route('admin.login');
    }
}
