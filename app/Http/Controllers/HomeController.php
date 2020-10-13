<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Facades\Auth;
use Illuminate\Http\Request;
use App\Applications;
use App\Student;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        #return view('home');
        #get the current user status
        #$appstatus=$this->getStatus($request->user()->id);
        $where = array('reference_no' =>$request->user()->application_referrence_no);
        $applications=Applications::where($where)->first();
        if (empty($applications)){
          return view('application.application');
        }
        //check if a candidate is admitted and now a student
        $std = array('reference_no' =>$request->user()->application_referrence_no);
        $student=Student::where($std)->first();
        if (!empty($student)) {
          return view('student.dashboard');
        }
        #get application status(rejected or pending)
        if ($applications->status=='Pending') {
          return view('application.status');
        }
        return view('application.application');
    }
}
