@extends('layouts.account')
@section('leftmenu')
  <li><?php if (!empty(auth()->user()->recommendation_file) && !empty(auth()->user()->bankslip)): ?>
    <a href="#" data-toggle="modal" data-target="#myapplication">Submit Application</a>
  <?php endif; ?> </li>
@endsection
@section('logoutbar')
  <!-- /.dropdown -->
  <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
      </a>
      <ul class="dropdown-menu dropdown-user">
          <li><a href="#"><i class="fa fa-user fa-fw"></i> Edit Password</a>
          </li>
          <li></li>
          <li class="divider"></li>
          <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout
            </a>
            <form id="logout-form" action="{{route('application.logout')}}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
      </ul>
      <!-- /.dropdown-user -->
  </li>
  <!-- /.dropdown -->
@endsection
@section('pageheading')
 <h1>Study Application|<?php echo DB::table('programs')->where('id',auth()->user()->program)->value('program_name');?></h1>
 <?php $app=App\Applications::where('reference_no',auth()->user()->application_referrence_no)->first(); ?>
 <?php if (empty($app)): ?>
   <span class="invalid-feedback">Application not submitted</span>
 <?php endif; ?>
 <hr>
@endsection
@section('content')
  <div class="row">
    <div class="col-lg-12">
      <?php if ($alert=Session::get('alert-success')): ?>
        <div class="alert alert-success alert-dismissable">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{$alert}}
        </div>
      <?php endif; ?>
    </div>
  </div>
  <?php if (!empty(auth()->user()->recommendation_file) && !empty(auth()->user()->bankslip)): ?>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <button type="button" name="button" class="btn btn-success pull-right btn-sm" data-toggle="modal" data-target="#myapplication">Submit Application</button>
      </div>
    </div>
  <?php endif; ?>
  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Basic Data</a>
                    </li>
                    <li><a href="#place" data-toggle="tab">Living place</a> </li>
                    <?php if (!empty(auth()->user()->country)): ?>
                      <li><a href="#language" data-toggle="tab">Languages</a>
                    <?php endif; ?>
                    </li>
                    <?php if (!empty(auth()->user()->native_languages) && auth()->user()->program==1): ?>
                      <li><a href="#education" data-toggle="tab">Education</a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty(auth()->user()->native_languages) && auth()->user()->program==2): ?>
                      <li><a href="#educationmaster" data-toggle="tab">Education</a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty(auth()->user()->high_school)||!empty(auth()->user()->university1) ||!empty(auth()->user()->college1)): ?>
                      <li><a href="#religous" data-toggle="tab">Medical and Religious</a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty(auth()->user()->ordained_status)||!empty(auth()->user()->treatment_status)): ?>
                      <li><a href="#essay" data-toggle="tab">Essays</a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty(auth()->user()->application_motivation) && auth()->user()->program==1): ?>
                      <li><a href="#uploads" data-toggle="tab">Uploads</a>
                      </li>
                    <?php endif; ?>
                    <?php if (!empty(auth()->user()->application_motivation) && auth()->user()->program==2): ?>
                      <li><a href="#masterupload" data-toggle="tab">Uploads</a>
                      </li>
                    <?php endif; ?>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                      <div class="row">
                        <form action="{{ route('application.basicdata') }}" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Firstname</label>@error('firstname')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="firstname" value="{{auth()->user()->first_name}}">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Lastname</label>
                            @error('lastname')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="lastname" value="{{auth()->user()->last_name}}">
                          </div>
                          <div class="clearfix">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Email Address</label>
                            @error('email')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="email" name="email" value="{{auth()->user()->email}}" readonly>
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>ID/Passport Number</label>
                            @error('idnumber')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="idnumber" value="{{auth()->user()->nid_passport_number}}">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Telephone</label>
                            @error('telephone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="telephone" value="{{auth()->user()->phone}}">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Date of birth</label>
                            @error('dobirth')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="date" name="dobirth">
                          </div>
                          <div class="colmd-12 col-lg-12">
                            <button type="submit" name="savebasicdata" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="place">
                      <div class="row">
                        <form action="{{ route('application.livingplace') }}" method="post">
                          @csrf
                          <div class="form-group col-md-12 col-lg-12">
                            Home Address
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="Country">Country</label>
                            @error('country')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="country" value="{{auth()->user()->country}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="province">City/Province</label>
                            @error('province')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="province" value="{{auth()->user()->city_province}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="district">District</label>
                            @error('district')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="district" value="{{auth()->user()->district}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="sector">Sector</label>
                            @error('sector')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="sector" value="{{auth()->user()->sector}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="cell">Cell</label>
                            @error('cell')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="cell" value="{{auth()->user()->cell}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="village">Village</label>
                            @error('village')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="village" value="{{auth()->user()->village}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="street">Street</label>
                            @error('street')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="street" value="{{auth()->user()->street}}" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="village">Place of birth</label>
                            @error('birthplace')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="birthplace" value="{{auth()->user()->birthplace}}" class="form-control">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <button type="submit" name="buttonplaces" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="language">
                      <div class="row">
                        <form action="{{ route('application.addlanguage') }}" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            Native languages
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            English Proficiency
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Native Language</label>
                            <span class="invalid-feedback">{{ $errors->first('nativelanguage') }}</span>
                            <input type="text" name="nativelanguage" value="{{auth()->user()->native_languages}}" class="form-control" id="nativelanguage">
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label>Speaking</label>
                            <span class="invalid-feedback">{{ $errors->first('englishspeech') }}</span>
                            <select class="form-control" name="englishspeech" id="englishspeech">
                              <option value="">select level</option>
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label>Reading and Writing</label>
                            <span class="invalid-feedback">{{ $errors->first('englishread') }}</span>
                            <select class="form-control" name="englishread" id="englishread">
                              <option value="">select level</option>
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>

                          <div class="form-group col-md-12 col-lg-12">
                            Other Languages
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="">Language1</label>
                            <input type="text" name="languageone" value="{{auth()->user()->other_language1}}" class="form-control" id="languageone">
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label for="speaking">Speaking</label>
                            <select class="form-control" name="onespeech" id="onespeech">
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label for="Reading and Writing">Reading and Writing</label>
                            <select class="form-control" name="oneread" id="oneread">
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="">Language2</label>
                            <input type="text" name="languagetwo" value="{{auth()->user()->other_language2}}" class="form-control" id="languagetwo">
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label for="speaking">Speaking</label>
                            <select class="form-control" name="twospeech" id="twospeech">
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-3 col-lg-3">
                            <label for="speaking">Speaking</label>
                            <select class="form-control" name="tworead" id="tworead">
                              <option value="Excellent">Excellent</option>
                              <option value="Good">Good</option>
                              <option value="Poor">Poor</option>
                            </select>
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <button type="buttonlanguage" name="button" class="btn btn-primary btn-block">save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="religous">
                      <div class="row">
                        <form action="{{route('application.religious')}}" method="post">
                          @csrf
                          <div class="col-md-12 col-md-12">
                            <p>Religious Background</p>
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Denomination</label>
                            <span class="invalid-feedback">{{ $errors->first('denomination') }}</span>
                            <input type="text" name="denomination" value="{{auth()->user()->denomination}}" class="form-control" id="denomination">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Name</label>
                            <span class="invalid-feedback">{{ $errors->first('demoname') }}</span>
                            <input type="text" name="demoname" value="{{auth()->user()->denomination_name}}" class="form-control" id="demoname">
                          </div>
                          <div class="form-group col-md-4 col-md-4">
                            <label>Are You Ordained ?</label>
                            <span class="invalid-feedback">{{ $errors->first('ordainedstatus') }}</span>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="ordainedstatus" value="Yes" id="statusyes">Yes
                              </label>&nbsp;&nbsp;
                              <label>
                                <input type="checkbox" name="ordainedstatus" value="No" id="statusno">No
                              </label>
                            </div>
                          </div>
                          <div class="form-group col-md-12 col-md-12" id="church">
                            <label>Church name</label><span class="invalid-feedback">{{ $errors->first('churchname') }}</span>
                            <input type="text" name="churchname" value="{{auth()->user()->ordained_church}}" class="form-control" id="churchname">
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <p>Medical Background</p>
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label >In the past five years, have you had any serious illness, either physical or emotional which required professional treatment ?</label>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="medicalstatus" value="Yes" id="medicalyes">Yes
                              </label>&nbsp;&nbsp;
                              <label>
                                <input type="checkbox" name="medicalstatus" value="No" id="medicalno">No
                              </label>
                              <span class="invalid-feedback">{{ $errors->first('medicalstatus') }}</span>
                            </div>
                          </div>
                          <div class="form-group col-md-12 col-lg-12" id="explainmedical">
                            <label>Explain</label>
                            <span class="invalid-feedback">{{ $errors->first('medicaldetail') }}</span>
                            <input type="text" name="medicaldetail" value="{{auth()->user()->treatment_description}}" class="form-control" id="medicaldetail">
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <button type="submit" name="buttonreligous" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="uploads">
                      <div class="row">
                        <form action="{{route('document.photo')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport photo</label><span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                            <input type="file" name="photo">
                            <?php if (!empty(auth()->user()->photo)): ?>
                              <span><a href="/files/<?php echo auth()->user()->photo; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.nationaId')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport/National ID</label><span class="invalid-feedback">{{ $errors->first('nationalid') }}</span>
                            <input type="file" name="nationalid">
                            <?php if (!empty(auth()->user()->nid_passport_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->nid_passport_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.diploma')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Advanced certificate/diploma </label><span class="invalid-feedback">{{ $errors->first('diploma') }}</span>
                            <input type="file" name="diploma">
                            <?php if (!empty(auth()->user()->advanced_diploma_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->advanced_diploma_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.recommendationletter')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Recommendation letter(Senior Pastor/Mentor/Academic)</label><br> <span class="invalid-feedback">{{ $errors->first('recommendation') }}</span>
                            <input type="file" name="recommendation">
                            <?php if (!empty(auth()->user()->recommendation_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->recommendation_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.payment')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Proof of payment(Application fees)</label><span class="invalid-feedback">{{ $errors->first('payment') }}</span>
                            <input type="file" name="payment">
                            <?php if (!empty(auth()->user()->bankslip)): ?>
                              <span><a href="/files/<?php echo auth()->user()->bankslip; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="essay">
                      <div class="row">
                        <form action="{{route('application.essay')}}" method="post">
                          @csrf
                          <div class="form-group col-md-12 col-lg-12">
                            <label>How did you learn about WMTS and what are the reasons you are applying for the program?(300 to 500 words)</label><span class="invalid-feedback">{{ $errors->first('essay') }}</span><br>
                            <button type="submit" name="button" class="pull-right btn btn-primary btn-sm">Save</button><br>
                            <textarea class="form-control" rows="3" name="essay">
                              {{auth()->user()->application_motivation}}
                            </textarea>
                          </div>
                        </form>
                      </div>

                      <div class="row">
                        <form action="{{route('application.autobiograph')}}" method="post">
                          @csrf
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Authobiographical essay (300 to 500 words)</label><span class="invalid-feedback">{{ $errors->first('biograph') }}</span>
                            <button type="submit" name="button" class="pull-right btn btn-primary btn-sm">Save</button><br>
                            <textarea  rows="5" class="form-control" name="biograph">
                              {{auth()->user()->bibliography}}
                            </textarea>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="masterupload">
                      <div class="row">
                        <form action="{{route('document.photo')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport photo</label><span class="invalid-feedback">{{ $errors->first('photo') }}</span>
                            <input type="file" name="photo">
                            <?php if (!empty(auth()->user()->photo)): ?>
                              <span><a href="/files/<?php echo auth()->user()->photo; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.nationaId')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport/National ID</label><span class="invalid-feedback">{{ $errors->first('nationalid') }}</span>
                            <input type="file" name="nationalid">
                            <?php if (!empty(auth()->user()->nid_passport_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->nid_passport_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.degree')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Degree and transcripts </label><span class="invalid-feedback">{{ $errors->first('diploma') }}</span>
                            <input type="file" name="diploma">
                            <?php if (!empty(auth()->user()->bacholor_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->bacholor_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.recommendationletter')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Recommendation letter(Senior Pastor/Mentor/Academic)</label><br> <span class="invalid-feedback">{{ $errors->first('recommendation') }}</span>
                            <input type="file" name="recommendation">
                            <?php if (!empty(auth()->user()->recommendation_file)): ?>
                              <span><a href="/files/<?php echo auth()->user()->recommendation_file; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="{{route('document.payment')}}" method="post" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Proof of payment(Application fees)</label><span class="invalid-feedback">{{ $errors->first('payment') }}</span>
                            <input type="file" name="payment">
                            <?php if (!empty(auth()->user()->bankslip)): ?>
                              <span><a href="/files/<?php echo auth()->user()->bankslip; ?>" target="_blank">Preview</a> </span>
                            <?php endif; ?>
                            <button type="submit" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="educationmaster">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <p>Education Background</p>
                        </div>
                        <form action="{{route('master.education')}}" method="post">
                          @csrf
                          <div class="form-group col-md-4 col-lg-4">
                            <label>High School</label><span class="invalid-feedback">{{ $errors->first('masterschool') }}</span>
                            <input type="text" name="masterschool" value="<?php echo auth()->user()->high_school; ?>" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Major</label><span class="invalid-feedback">{{$errors->first('schoolmajor')}}</span>
                            <input type="text" name="schoolmajor" value="{{auth()->user()->high_school}}" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Qualification</label><span class="invalid-feedback">{{$errors->first('certificate')}}</span>
                            <input type="text" name="certificate" value="" class="form-control">
                          </div>

                          <div class="form-group col-md-4 col-lg-4">
                            <label>University Attended</label><span class="invalid-feedback">{{$errors->first('university')}}</span>
                            <input type="text" name="university" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Major</label><span class="invalid-feedback">{{$errors->first('universitymajor')}}</span>
                            <input type="text" name="universitymajor" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Qualification</label><span class="invalid-feedback">{{$errors->first('universityqualification')}}</span>
                            <input type="text" name="universityqualification" value="" class="form-control">
                          </div>

                          <div class="form-group col-md-4 col-lg-4">
                            <label>College Attended</label><span class="invalid-feedback">{{$errors->first('college')}}</span>
                            <input type="text" name="college" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Major</label><span class="invalid-feedback">{{$errors->first('collegemajor')}}</span>
                            <input type="text" name="collegemajor" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Qualification</label><span class="invalid-feedback">{{$errors->first('collegequalification')}}</span>
                            <input type="text" name="collegequalification" value="" class="form-control">
                          </div>

                          <div class="form-group col-md-4 col-lg-4">
                            <label>Seminary Attended</label><span class="invalid-feedback">{{$errors->first('seminary')}}</span>
                            <input type="text" name="seminary" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Major</label><span class="invalid-feedback">{{$errors->first('seminarymajor')}}</span>
                            <input type="text" name="seminarymajor" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Qualification</label><span class="invalid-feedback">{{$errors->first('seminaryqualification')}}</span>
                            <input type="text" name="seminaryqualification" value="" class="form-control">
                          </div>
                          <div class="form-group col-lg-12 col-md-12">
                            <button type="submit" name="buttoneducation" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="education">
                      <div class="row">
                        <div class="col-md-12 col-lg-12">
                          <p>Education Background</p>
                        </div>
                        <form action="{{route('application.addeducation')}}" method="post">
                          @csrf
                          <div class="form-group col-md-12 col-lg-12">
                            <label>High School Attended</label>
                            <span class="invalid-feedback">{{ $errors->first('school') }}</span>
                            <input type="text" name="school" value="{{auth()->user()->high_school}}" class="form-control" id="school">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Major Field</label>
                            <span class="invalid-feedback">{{ $errors->first('major') }}</span>
                            <input type="text" name="major" value="{{auth()->user()->high_school}}" class="form-control" id="major">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Qualification</label>
                            <span class="invalid-feedback">{{ $errors->first('qualification') }}</span>
                            <input type="text" name="qualification" value="{{auth()->user()->high_school}}" class="form-control" id="qualification">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <button type="submit" name="buttoneducation" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myapplication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Submit My Application</h4>
                        </div>
                        <div class="modal-body">
                          <div class="alert alert-danger alert-dismissable">
                            Please verify that you have given all required data, no more editting once submitted
                          </div>
                          <form action="{{route('application.submit')}}" method="post">
                            @csrf
                            <input type="hidden" name="reference" value="<?php echo  auth()->user()->application_referrence_no;?>">
                            <button type="submit" name="button" class="btn btn-success btn-block">submit Application</button>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div><!--end of modal -->
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
  </div>
@endsection
