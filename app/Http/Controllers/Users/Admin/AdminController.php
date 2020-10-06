<?php

namespace App\Http\Controllers\Users\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Role;
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
}
