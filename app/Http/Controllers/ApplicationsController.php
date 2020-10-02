<?php

namespace App\Http\Controllers;

use App\Applications;
use Illuminate\Http\Request;
use App\Candidate;
class ApplicationsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth:student');
    }
    public function addBasicData(Request $request)
    {
      $request->validate([
        'firstname'=>['required', 'string', 'max:255'],'lastname'=>['required', 'string', 'max:255'],
        'idnumber'=>['required','string','max:255','min:16','unique:candidates,nid_passport_number'],
        'telephone'=>['required','string','min:10','unique:candidates,phone'],
        'dobirth'=>['required','string','max:255'],
      ],[
        'telephone.unique'=>'Telephone already registered',
        'idnumber.unique'=>'Already exists','idnumber.required'=>'This field is required',
        'dobirth.required'=>'This field is required',
        'idnumber.min'=>'This should be atleast 16 characters',
        'telephone.min'=>'This should be atleast 10 characters long',
      ]);
      #get the current logged in applicant
      $data = $request->all();
      $save = array('first_name' =>$data['firstname'] ,
      'last_name'=>$data['lastname'],
      'dob'=>$data['dobirth'],
      'nid_passport_number'=>$data['idnumber'],'phone'=>$data['telephone']);
      $userid=$request->user()->id;
      Candidate::findOrFail($userid)->update($save);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function addLivingPlace(Request $request)
    {
      $request->validate([
        'country'=>['required','max:255'],
        'province'=>['required','max:255'],
        'district'=>['required','max:255'],
        'sector'=>['required','max:255'],
        'cell'=>['required','max;255'],
        'village'=>['required','max:255'],
        'birthplace'=>['required','max:255'],
      ],[
        'birthplace.required'=>'This field is required',
        'province.required'=>'This field is required',
      ]);
    }
}
