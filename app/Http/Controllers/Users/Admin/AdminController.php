<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\ApplicationSchedule;
use App\Program;
class AdminController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:admin');
    }
    public function index()
    {
      $data = array(
        'users' =>User::all('id','role_id','name','email','created_at'),
        'roles'=>Role::all('id','role_name','created_at'),
        'programs'=>Program::all('id','program_name'),
        'apply'=>ApplicationSchedule::all('id','program_id','application_start_date','application_close_date'),
      );
      return view('admin.dashboard',$data);
    }
    public function addRole(Request $request)
    {
      $request->validate([
        'rolename'=>'bail|required|string|max:255',
      ],[
        'rolename.required'=>'This field is required'
      ]);
      $data = array('role_name' =>$request->rolename);
      Role::create($data);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function addSchedule(Request $request)
    {
      $request->validate([
        'program'=>'bail|required|integer',
        'startdate'=>'bail|required',
        'enddate'=>'bail|required',
      ]);
      //update if the program exists
      $check=ApplicationSchedule::where('program_id',$request->program)->get();
      if (count($check)>0) {
        $save = array('application_start_date'=>$request->startdate,'application_close_date'=>$request->enddate);
        ApplicationSchedule::where('program_id',$request->program)->update($save);
        return redirect()->back()->with('alert-success','Data saved');
      }
      $data = array('program_id' =>$request->program ,'application_start_date'=>$request->startdate,'application_close_date'=>$request->enddate);
      ApplicationSchedule::create($data);
      return redirect()->back()->with('alert-success','Data saved');
    }
}
