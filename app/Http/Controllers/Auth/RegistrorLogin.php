<?php
#RegistrorLogin
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class RegistrorLogin extends Controller
{
    public function __construct()
    {
      //$this->middleware('guest:registror')->except('logout');
    }
    public function showLoginForm()
    {
      #display registror login form
      return view('auth.registrorlogin');
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
      $where = array('email' =>$request->email,'password'=>$request->password,'role_id'=>'2');
      if (Auth::guard('registror')->attempt($where)){
        return redirect()->intended(route('registror.dashboard'));
      }
      $errors = array('password' =>'Email or password is invalid');
      return redirect()->back()->withErrors($errors)->withInput($request->only('email'));
    }
}
