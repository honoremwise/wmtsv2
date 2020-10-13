<?php

namespace App\Http\Controllers;

use App\Applications;
use Illuminate\Http\Request;
use App\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
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
    public function masterEducation(Request $request)
    {
      //master applicant
      //education Background
      $request->validate([
        'masterschool'=>'bail|required|max:255|string',
        'schoolmajor'=>'bail|required|max:255|string',
        'certificate'=>'bail|required|max:255|string',
        'university'=>'nullable|max:255|string','universitymajor'=>'nullable|max:255|string',
        'universityqualification'=>'nullable|max:255|string',
        'college'=>'nullable|max:255|string','collegemajor'=>'nullable|max:255|string',
        'collegequalification'=>'nullable|max:255|string',
        'seminary'=>'nullable|max:255|string','seminarymajor'=>'nullable|max:255|string','seminaryqualification'=>'nullable|max:255|string',
      ],
      [
        'masterschool.required'=>'This field is required','schoolmajor.required'=>'This field is required','certificate.required'=>'This field is required',
      ]);
      $school=$request->masterschool.'_'.$request->schoolmajor.'_'.$request->certificate;
      $university=$request->university.'_'.$request->universitymajor.'_'.$request->universityqualification;
      $college=$request->college.'_'.$request->collegemajor.'_'.$request->collegequalification;
      $seminary=$request->seminary.'_'.$request->seminarymajor.'_'.$request->seminaryqualification;
      $data = array('high_school' =>$school,'university1'=>$university,'college1'=>$college,'seminary1'=>$seminary);
      $userid=$request->user()->id;
      Candidate::find($userid)->update($data);
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
    public function addPhoto(Request $request)
    {
      //profile picture
      $request->validate(
        ['photo'=>'required|mimes:jpg,jpeg,png,gif|max:1048'],
        ['photo.required'=>'Please upload image file','photo.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('photo')){
        return back();
      }
      $file=$request->file('photo');
      $extension=$file->extension();
      $filename='photo'.time().'.'.$extension;
      $data = array('photo' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->photo;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->photo->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }
    public function addDiploma(Request $request)
    {
      // upload candidate diploma
      $request->validate(
        ['diploma'=>'required|mimes:pdf|max:1048'],
        ['diploma.required'=>'Please upload pdf file','diploma.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('diploma')){
        return back();
      }
      $file=$request->file('diploma');
      $extension=$file->extension();
      $filename='diploma'.time().'.'.$extension;
      $data = array('advanced_diploma_file' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->advanced_diploma_file;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->diploma->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }

    public function addDegree(Request $request)
    {
      // upload candidate diploma
      $request->validate(
        ['diploma'=>'required|mimes:pdf|max:1048'],
        ['diploma.required'=>'Please upload pdf file','diploma.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('diploma')){
        return back();
      }
      $file=$request->file('diploma');
      $extension=$file->extension();
      $filename='diploma'.time().'.'.$extension;
      $data = array('bacholor_file' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->advanced_diploma_file;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->diploma->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }

    public function addPayment(Request $request)
    {
      // upload application fees proof of payment
      $request->validate(
        ['payment'=>'required|mimes:jpg,jpeg,png,gif,pdf|max:1048'],
        ['payment.required'=>'Please upload pdf file','payment.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('payment')){
        return back();
      }
      $file=$request->file('payment');
      $extension=$file->extension();
      $filename='payment'.time().'.'.$extension;
      $data = array('bankslip' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->bankslip;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->payment->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }
    public function addRecommendation(Request $request)
    {
      //upload recommendation letter
      $request->validate(
        ['recommendation'=>'required|mimes:pdf|max:1048'],
        ['recommendation.required'=>'Please upload pdf file','recommendation.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('recommendation')){
        return back();
      }
      $file=$request->file('recommendation');
      $extension=$file->extension();
      $filename='recommendation'.time().'.'.$extension;
      $data = array('recommendation_file' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->recommendation_file;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->recommendation->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }
    public function addNationalId(Request $request)
    {
      // national or passport identification
      $request->validate(
        ['nationalid'=>'required|mimes:pdf|max:1048'],
        ['nationalid.required'=>'Please upload pdf file','nationalid.max'=>'Upload file less than 1MB']);
      if (!$request->hasFile('nationalid')){
        return back();
      }
      $file=$request->file('nationalid');
      $extension=$file->extension();
      $filename='nationalid'.time().'.'.$extension;
      $data = array('nid_passport_file' => $filename);
      $userid=$request->user()->id;
      //upload the file
      //check and delete existing file
      $path=public_path('files/');
      $file=$path.$request->user()->nid_passport_file;
      if (file_exists($file)) {
        File::delete($file);
      }
      Candidate::findOrFail($userid)->update($data);
      $request->nationalid->move(public_path('files/'),$filename);
      return redirect()->back()->with('alert-success','File uploaded successfuly');
    }
    public function submitApplication(Request $request)
    {
      // submit application
      $request->validate(['reference'=>'required|string|max:255']);
      //check for previous application submitted
      $reference=$request->reference;
      $application=Applications::where('reference_no',$reference)->first();
      if (!empty($application['reference_no'])) {
        // resubmit of application
        //number_of_application','latest_application_year
        $number=$application['number_of_application']+1;
        $year=date('Y-m-d');
        $update = array('latest_application_year'=>$year,'number_of_application'=>$number,'status'=>'Pending');
        $id=$application['id'];
        Applications::findOrFail($id)->update($update);
        return redirect()->intended(route('home'));
      }
      $year=date('Y-m-d');
      $data = array('reference_no' =>$reference,'latest_application_year'=>$year,'number_of_application'=>'1','status'=>'Pending');
      //save application
      $save=Applications::create($data);
      return redirect()->intended(route('home'));
    }
    public function logout()
    {
      Auth::guard('student')->logout();
      return redirect()
        ->route('signin');
    }
}
