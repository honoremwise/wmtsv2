<?php

namespace App\Http\Controllers\Users\Admissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdmissionController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admission');
    }
    public function index()
    {
      return view('admissions.dashboard');
    }
}
