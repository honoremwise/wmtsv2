<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
class StudentLogin extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:student')->except('logout');
  }
  public function login(Request $request)
  {
    //student_candidate authentication
    $this->validate($request,[
      'username'=>'required|min:6',
      'password'=>'required|min:8',
    ],[
      'username.min'=>'This username is too short',
      'password.min'=>'Password is to short',
    ]);
    $where = array('username' =>$request->username,'password'=>$request->password);
    #Attempt to login the user
    if (Auth::guard('student')->attempt($where)) {
      return redirect()->intended(route('home'));
    }
    $errors = array('password' =>'username or password is invalid');
    return redirect()->back()->withErrors($errors)->withInput($request->only('username'));
  }
}
