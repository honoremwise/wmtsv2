<?php

namespace App\Http\Controllers;

use App\Applications;
use Illuminate\Http\Request;
use App\Candidate;
use Illuminate\Support\Facades\Auth;
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
        'country'=>['required','max:255','string'],
        'province'=>['required','max:255','string'],
        'district'=>['required','max:255','string'],
        'sector'=>['required','max:255','string'],
        'cell'=>['required','max:255'],
        'village'=>['required','max:255'],
        'birthplace'=>['required','max:255'],
        'street'=>['required','max:255'],
      ],[
        'birthplace.required'=>'This field is required',
        'province.required'=>'This field is required',
      ]);
      $userid=$request->user()->id;
      $save = array('country' =>$request->country,'district'=>$request->district,
      'city_province'=>$request->province,'village'=>$request->village,'street'=>$request->street,
      'sector'=>$request->sector,'cell'=>$request->cell,'birthplace'=>$request->birthplace);
      Candidate::findOrFail($userid)->update($save);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function addLanguages(Request $request)
    {
      // run validation
      $request->validate([
        'nativelanguage'=>'bail|required|string|max:255',
        'englishspeech'=>'bail|required|string|max:255','englishread'=>'bail|required|max:255',
        'languageone'=>'bail|nullable|string|max:255','onespeech'=>'bail|nullable|string|max:255',
        'oneread'=>'bail|nullable|string|max:255','languagetwo'=>'bail|nullable|string|max:255',
        'twospeech'=>'bail|nullable|string|max:255','tworead'=>'bail|nullable|string|max:255',
      ],[
        'nativelanguage.required'=>'This field is required',
        'englishspeech.required'=>'This selection is required',
        'englishread.required'=>'This selection is required',
      ]);
      $english=$request->englishspeech.'_'.$request->englishread;
      $languageone=$request->languageone.'_'.$request->onespeech.'_'.$request->oneread;
      $languagetwo=$request->languagetwo.'_'.$request->twospeech.'_'.$request->tworead;
      $data = array('native_languages' =>$request->nativelanguage,
      'english_proficiency'=>$english,'other_language1'=>$languageone,'other_language2'=>$languagetwo);
      //save data
      $userid=$request->user()->id;
      Candidate::findOrFail($userid)->update($data);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function addEducation(Request $request)
    {
      #run validation check
      $request->validate([
        'school'=>'bail|required|max:255|string','major'=>'bail|required|string|max:255','qualification'=>'bail|required|string|max:255'
      ],[
        'school.required'=>'This field is required','major.required'=>'This field is required','qualification.required'=>'This field is required',
      ]);
      $school=$request->school.'_'.$request->major.'_'.$request->qualification;
      $data = array('high_school' =>$school);
      $userid=$request->user()->id;
      Candidate::findOrFail($userid)->update($data);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function addReligous(Request $request)
    {
      #get data validated
      $request->validate([
        'demoname'=>'bail|required|string|max:255',
        'denomination'=>'bail|required|string|max:255',
        'churchname'=>'nullable|string|max:255',
        'medicalstatus'=>'required|string|max:4',
        'ordainedstatus'=>'required|string|max:4',
        'medicaldetail'=>'nullable|string|max:255',
      ],
      [
        'demoname.required'=>'This field is required',
        'churchname.string'=>'Invalid inputs',
        'denomination.required'=>'This field is required',
        'medicalstatus.required'=>'Please select your choice',
        'ordainedstatus.required'=>'Please select your choice'
      ]);
      $data = array('denomination_name' =>$request->demoname,'denomination'=>$request->denomination,
      'ordained_status'=>$request->ordainedstatus,'ordained_church'=>$request->churchname,
      'treatment_status'=>$request->medicalstatus,'treatment_description'=>$request->medicaldetail);
      $userid=$request->user()->id;
      Candidate::findOrFail($userid)->update($data);
      return redirect()->back()->with('alert-success','Data saved');
    }//end of function
    public function addEssay(Request $request)
    {
      $request->validate(
        ['essay'=>'bail|required|string'],
        ['essay.required'=>'This field is required']);
        $essay = array('application_motivation' =>$request->essay);
        Candidate::findOrFail($request->user()->id)->update($essay);
        return redirect()->back()->with('alert-success','Data saved');
    }
    public function addBiograph(Request $request)
    {
      $request->validate(
        ['biograph'=>'bail|required|string'],
        ['biograph.required'=>'Required field']);
      $data = array('bibliography' =>$request->biograph);
      Candidate::findOrFail($request->user()->id)->update($data);
      return redirect()->back()->with('alert-success','Data saved');
    }
    public function logout()
    {
      Auth::guard('student')->logout();
      return redirect()
        ->route('signin');
    }
}
