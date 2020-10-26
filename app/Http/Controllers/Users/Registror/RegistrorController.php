<?php

namespace App\Http\Controllers\Users\Registror;
use App\Applications;
use App\Student;
use App\Marks;
use App\Candiate;
use App\Program;

use App\learning_status;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
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
    //getting all records from registror core tables
    public function applicants(){
     $data=array('applications' => DB::table('applications')
     ->Join('candidates', 'applications.reference_no', '=', 'candidates.application_referrence_no')
     ->join('programs','programs.id','=','candidates.program')
     ->get(),);
    //  dd($data);
     return view('registror.dashboard',$data);
    }
    public function students(){
      $students = new Student();
      $data=$students::all();
      return view('registror.dashboard',compact('data'));
    }
    public function marks(){
      $getmarks = new Marks();
      $marks=$getmarks::all();
      return view('registror.dashboard',compact('marks'));
    }
    public function learning_status(){
      $learning_status = new Learning_status();
      $learning_status::all();
      return view('registror.dashboard',compact('learning_status'));
    }
}
