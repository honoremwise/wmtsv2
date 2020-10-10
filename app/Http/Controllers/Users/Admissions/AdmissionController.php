<?php

namespace App\Http\Controllers\Users\Admissions;
use App\Candidate;
use App\Applications;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class AdmissionController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admission');
    }
    public function index()
    {
      $data = array(
        'candidates' =>DB::select("select * from candidates where application_referrence_no NOT IN(select reference_no from applications)"),
        'approved'=>DB::select("select * from candidates where application_referrence_no IN(select reference_no from applications where status='approved')"),
        'pending'=>DB::select("select * from candidates where application_referrence_no IN(select reference_no from applications where status='pending')"),);
      return view('admissions.dashboard',$data);
    }
}
