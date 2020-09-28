<?php
#RegistrorLogin
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrorLogin extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:registror')->except('logout');
    }
    public function showLoginForm()
    {
      #display registror login form
      return view('auth.registrorlogin');
    }
    public function login(Request $request)
    {
      // handle form login data submitted here
      #once login succeeds go here
      #return redirect()->intended(route('registror.dashboard'));
      echo "go dashboard";
    }
}
