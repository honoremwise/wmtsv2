<?php

namespace App\Http\Controllers;
use App\Candidate;
use App\Program;
use App\PHPMailer\PHPMailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class CandidateController extends Controller
{
    public function __construct()
    {
      $this->middleware('guest:student')->except('logout');
    }
    public function index()
    {
      $pro = array('programs' => Program::all());
      return view('application/account',$pro);
    }
    public function signin()
    {
      return view('welcome');
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
      $data=$request->all();
      $referenceNumber=$this->referenceNumber($data['program']);
      Candidate::create([
          'first_name' => $data['firstname'],
          'last_name' => $data['lastname'],
          'program'=>$data['program'],
          'phone'=>$data['phone'],
          'application_referrence_no'=>$referenceNumber,
          'username'=>$referenceNumber,
          'email' => $data['email'],
          'nid_passport_number'=>$data['passportid'],
          'password' => Hash::make($data['password']),
      ]);
      $this->sendAccount($data['email'],$referenceNumber,$data['password']);
      return redirect()->back()->with('alert-success','Go to your email for logging in to our system');
    }
    protected function referenceNumber($program)
    {
      // format reference number here
      //$reference=program.yearapplied.numberofapplicantsintheprogramincremented.
      $where = array('program' =>$program);
      $applicants=count(Candidate::where($where)->get())+1;
      $reference=$program.date('Y').$applicants;
      return $reference;
    }

    protected function sendAccount($to,$ref_no,$pass)
    {
      // send username and password registered on candidates email
      # get PHPMailer instance library
      $mail=new PHPMailer();
      $mail->IsSMTP(); // enable SMTP
      $mail->SMTPDebug = 0; // debugging: 1 = errors and messages, 2 = messages only
      $mail->SMTPAuth = true; // authentication enabled
      $mail->SMTPSecure = 'tsl'; // secure transfer enabled REQUIRED for Gmail
      $mail->Host = "smtp.gmail.com";
      $mail->Port = 587;
      $mail->IsHTML(true);
      $mail->Username = "superuser.uwmf@gmail.com";
      $mail->Password = "0781549903";
      $mail->setFrom('admin@sihs.education', 'Student Application');
      //$mail->addReplyTo('nteclovis2019@gmail.com', 'Faustin');
      // Add a recipient
      $mail->addAddress($to);
      $mail->Subject = 'Account verification';
      // Set email format to HTML
      $mail->isHTML(true);
      // Email body content
      $link = url(config('app.url'));
      $mailContent=
      "<h3>Account Login Details</h3>
      <p>Dear Applicant, The following are your username and password you chose on our system.</p>
      </br>
      <b>Username:</b>$ref_no
      <b>Password:</b>$pass
      <p>$link<p>
      <p>Thank you,</p>
      <p>Administrator<p>";
      $mail->Body = $mailContent;
      // Send email
      if (!$mail->send()){
        //echo 'Message could not be sent.';
        #echo 'Mailer Error: ' . $mail->ErrorInfo;
        return false;
      } else{
        return true;
      }
    }//end of function
}
