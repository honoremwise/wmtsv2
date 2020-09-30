<?php

namespace App\Http\Controllers\Users\Registror;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegistrorController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:registror');
    }
    public function index()
    {
      return view('registror.dashboard');
    }
}
