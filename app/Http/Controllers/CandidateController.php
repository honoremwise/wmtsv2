<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $pro = array('programs' => Program::all());
      return view('application/account',$pro);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //create new candidate account
      $request->validate([
          'firstname' => ['required', 'string', 'max:255'],'lastname' => ['required', 'string', 'max:255'],
          'program' => ['required', 'integer','min:1'],
          'passportid' => ['required', 'string','min:16','unique:candidates,nid_passport_number'],
          'phone' => ['required', 'string','min:10','unique:candidates'],
          'email' => ['required', 'string', 'email', 'max:255', 'unique:candidates'],
          'password' => ['required', 'string', 'min:8', 'confirmed'],
      ],[
        'program.integer'=>'Invalid selection',
        'passportid.min'=>'This should be atleast 16 characters',
      ]);
      //make a reference number(skipped by now)
      $data=$request->all();
      Candidate::create([
          'first_name' => $data['firstname'],
          'last_name' => $data['lastname'],
          'program'=>$data['program'],
          'phone'=>$data['phone'],
          'application_refence_no'=>"23",
          'username'=>$data['email'],
          'email' => $data['email'],
          'nid_passport_number'=>$data['passportid'],
          'password' => Hash::make($data['password']),
      ]);
      return view('welcome');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidate  $candidate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        //
    }
}
