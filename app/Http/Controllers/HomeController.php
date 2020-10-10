<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Facades\Auth;
use Illuminate\Http\Request;
use App\Applications;
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
        #get application status(approved, rejected or pending)
        $status=$applications->status;
        #echo "go student";
    }
}
