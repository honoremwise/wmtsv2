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
      //get latest application schedules
      $data = array(
        'candidates' =>DB::select("select * from candidates where application_referrence_no NOT IN(select reference_no from applications)"),
        'approved'=>DB::select("select * from candidates where application_referrence_no IN(select reference_no from applications where status='admitted')"),
        'rejected'=>DB::select("select * from candidates where application_referrence_no IN(select reference_no from applications where status='rejected')"),
        'pending'=>DB::select("select * from candidates where application_referrence_no IN(select reference_no from applications where status='pending')"),
        //the following queries are mal formatted and return invalid data
        'bachelor'=>DB::select("select * from applications where latest_application_year <=(select application_close_date from application_schedules where program_id='1') and latest_application_year >=(select application_start_date from application_schedules where program_id='1')"),
        'master'=>DB::select("select * from applications where latest_application_year <=(select application_close_date from application_schedules where program_id='2') and latest_application_year >=(select application_start_date from application_schedules where program_id='2')"),
      );
      return view('admissions.dashboard',$data);
    }
    public function applicantsView(Request $request)
    {
      $request->validate(['program'=>'bail|required|max:255']);
      //view current applications in this program
      $program=$request->program;
      $data = array('applications' =>DB::select("select * from applications where latest_application_year <=(select application_close_date from application_schedules where program_id='$program') and latest_application_year >=(select application_start_date from application_schedules where program_id='$program')"),
      'program'=>$program);
      return view('admissions.applications',$data);
    }
    public function applicantsRejected()
    {
      // rejected applications
      $data=array('rejected' => DB::table('applications')->where('status', 'rejected')
      ->Join('candidates', 'applications.reference_no', '=', 'candidates.application_referrence_no')
      ->join('programs','programs.id','=','candidates.program')
      ->get(),);
      return view('admissions.multipleview',$data);
    }
    public function applicantsAdmitted()
    {
      // view admitted candidates
      $data=array('admitted' => DB::table('applications')->where('status', 'admitted')
      ->Join('candidates', 'applications.reference_no', '=', 'candidates.application_referrence_no')
      ->join('programs','programs.id','=','candidates.program')
      ->get());
      return view('admissions.multipleview',$data);
    }
    public function applicantsInProgress()
    {
      $data = array('candidates' =>DB::select("select * from candidates where application_referrence_no NOT IN(select reference_no from applications)"));
      return view('admissions.multipleview',$data);
    }
    public function appDetails(Request $request)
    {
      // get all candidate details
      $request->validate(['candidate'=>'bail|required|integer']);
      $reference=$request->candidate;
      $data=array('details' => DB::table('applications')->where('application_referrence_no', $reference)
      ->Join('candidates', 'applications.reference_no', '=', 'candidates.application_referrence_no')
      ->join('programs','programs.id','=','candidates.program')
      ->get());
      return view('admissions.appdetails',$data);
    }
}
