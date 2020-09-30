<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Facades\Auth;
use Illuminate\Http\Request;

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
        $appstatus=$this->getStatus($request->user()->);
        
    }
    protected function getStatus()
    {
      // code...
    }
}
