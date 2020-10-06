@extends('layouts.account')
@section('leftmenu')
  <p></p>
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
            <!--
            <a href=""><i class="fa fa-sign-out fa-fw"></i> Logout</a>
          -->
          </li>
      </ul>
      <!-- /.dropdown-user -->
  </li>
  <!-- /.dropdown -->
@endsection
@section('pageheading')
 <h1>Study Application|Bachelor Degree</h1><hr>
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
                    <li><a href="#language" data-toggle="tab">Languages</a>
                    </li>
                    <li><a href="#education" data-toggle="tab">Education</a>
                    </li>
                    <li><a href="#religous" data-toggle="tab">Medical and Religious</a>
                    </li>
                    <li><a href="#essay" data-toggle="tab">Essays</a>
                    </li>
                    <li><a href="#uploads" data-toggle="tab">Uploads</a>
                    </li>
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
                            <input class="form-control" type="text" name="firstname">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Lastname</label>
                            @error('lastname')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="lastname">
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
                            <input class="form-control" type="text" name="idnumber">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Telephone</label>
                            @error('telephone')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input class="form-control" type="text" name="telephone">
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
                            <input type="text" name="country" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="province">City/Province</label>
                            @error('province')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="province" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="district">District</label>
                            @error('district')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="district" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="sector">Sector</label>
                            @error('sector')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="sector" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="cell">Cell</label>
                            @error('cell')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="cell" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="village">Village</label>
                            @error('village')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="village" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="street">Street</label>
                            @error('street')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="street" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label for="village">Place of birth</label>
                            @error('birthplace')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <input type="text" name="birthplace" value="" class="form-control">
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
                            <input type="text" name="nativelanguage" value="" class="form-control" id="nativelanguage">
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
                            <input type="text" name="languageone" value="" class="form-control" id="languageone">
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
                            <input type="text" name="languagetwo" value="" class="form-control" id="languagetwo">
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
                            <input type="text" name="denomination" value="" class="form-control" id="denomination">
                          </div>
                          <div class="form-group col-md-4 col-lg-4">
                            <label>Name</label>
                            <span class="invalid-feedback">{{ $errors->first('demoname') }}</span>
                            <input type="text" name="demoname" value="" class="form-control" id="demoname">
                          </div>
                          <div class="form-group col-md-4 col-md-4">
                            <label>Are You Ordained ?</label>
                            <span class="invalid-feedback">{{ $errors->first('ordainedstatus') }}</span>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="ordainedstatus" value="Yes">Yes
                              </label>&nbsp;&nbsp;
                              <label>
                                <input type="checkbox" name="ordainedstatus" value="No">No
                              </label>
                            </div>
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <label>Church name</label><span class="invalid-feedback">{{ $errors->first('churchname') }}</span>
                            <input type="text" name="churchname" value="" class="form-control" id="churchname">
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <p>Medical Background</p>
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label >In the past five years, have you had any serious illness, either physical or emotional which required professional treatment ?</label>
                            <div class="checkbox">
                              <label>
                                <input type="checkbox" name="medicalstatus" value="Yes">Yes
                              </label>&nbsp;&nbsp;
                              <label>
                                <input type="checkbox" name="medicalstatus" value="No">No
                              </label>
                              <span class="invalid-feedback">{{ $errors->first('medicalstatus') }}</span>
                            </div>
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Explain</label>
                            <span class="invalid-feedback">{{ $errors->first('medicaldetail') }}</span>
                            <input type="text" name="medicaldetail" value="" class="form-control" id="medicaldetail">
                          </div>
                          <div class="form-group col-md-12 col-md-12">
                            <button type="submit" name="buttonreligous" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="uploads">
                      <div class="row">
                        <form action="" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport photo</label>
                            <input type="file">
                            <button type="button" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Passport/National ID</label>
                            <input type="file">
                            <button type="button" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Advanced certificate/diploma </label>
                            <input type="file">
                            <button type="button" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Recommendation letter(Senior Pastor/Mentor/Academic)</label>
                            <input type="file">
                            <button type="button" name="button" class="btn btn-primary btn-sm">Upload</button>
                          </div>
                        </form>
                        <form action="" method="post">
                          @csrf
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Proof of payment(Application fees)</label>
                            <input type="file">
                            <button type="button" name="button" class="btn btn-primary btn-sm">Upload</button>
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
                            <textarea class="form-control" rows="3" name="essay"></textarea>
                          </div>
                        </form>
                      </div>

                      <div class="row">
                        <form action="{{route('application.autobiograph')}}" method="post">
                          @csrf
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Authobiographical essay (300 to 500 words)</label><span class="invalid-feedback">{{ $errors->first('biograph') }}</span>
                            <button type="submit" name="button" class="pull-right btn btn-primary btn-sm">Save</button><br>
                            <textarea  rows="5" class="form-control" name="biograph"></textarea>
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
                            <input type="text" name="school" value="" class="form-control" id="school">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Major Field</label>
                            <span class="invalid-feedback">{{ $errors->first('major') }}</span>
                            <input type="text" name="major" value="" class="form-control" id="major">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <label>Qualification</label>
                            <span class="invalid-feedback">{{ $errors->first('qualification') }}</span>
                            <input type="text" name="qualification" value="" class="form-control" id="qualification">
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <button type="submit" name="buttoneducation" class="btn btn-primary btn-block">Save</button>
                          </div>
                        </form>
                      </div>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
  </div>
@endsection
