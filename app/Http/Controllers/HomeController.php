<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Applications;
use App\Student;
use Illuminate\Support\Facades\DB;
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
        #get the current user status and application schedule status
        $now=strtotime("now");
        $schedule = DB::select("select * from application_schedules where UNIX_TIMESTAMP(application_close_date) >= $now");
        $where = array('reference_no' =>$request->user()->application_referrence_no);
        $applications=Applications::where($where)->first();
        if (empty($applications) && count($schedule)>0){
          return view('application.application');
        }
        //check if a candidate is admitted and now a student
        $std = array('reference_no' =>$request->user()->application_referrence_no);
        $student=Student::where($std)->first();
        if (!empty($student)) {
          return view('student.dashboard');
        }
        if (!empty($applications) && count($schedule)>0) {
          #get application status(rejected or pending)
          if ($applications->status=='pending') {
            return view('application.status');
          }
          if ($applications->status=='rejected' && count($schedule)>0){
            return view('application.application');
          }
        }
        Auth::guard('student')->logout();
        return view('application.closed');
    }
}
