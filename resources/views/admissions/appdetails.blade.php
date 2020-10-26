@extends('layouts.page')
@section('leftmenu')
  <li>
    <a href="{{route('admissionofficer')}}"><i class="fa fa-dashboard fa-fw"></i> My Home</a>
  </li>
@endsection
@section('pageheading')
 <h1>Application Details</h1><hr>
@endsection
@section('content')
  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#applications" data-toggle="tab">Basic Data</a>
                    </li>
                    <li>
                      <a href="#english" data-toggle="tab">English Proficiency</a>
                    </li>
                    <li>
                      <a href="#denomination" data-toggle="tab">Denomination</a>
                    </li>
                    <li>
                      <a href="#document" data-toggle="tab">Supporting Documents</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="applications">
                      <div class="row">
                        <table width="100%" class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th></th> <th></th> <th></th> <th></th> <th></th> <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <td><label>Names</label></td> <td>{{$details[0]->first_name}} {{$details[0]->last_name}}</td> <td><label>Email Address</label> </td> <td>{{$details[0]->email}}</td> <td></td> <td></td>
                            </tr>
                            <tr>
                              <td><label>Telephone</label></td> <td>{{$details[0]->phone}}</td> <td><label>Identity/Passport</label></td> <td>{{$details[0]->nid_passport_number}}</td> <td></td> <td></td>
                            </tr>
                            <tr>
                              <td><label>Date of birth</label></td> <td>{{$details[0]->dob}}</td> <td><label>Place of birth</label></td> <td>{{$details[0]->birthplace}}</td> <td></td> <td></td>
                            </tr>
                            <td colspan="4">Current Address</td>
                            <tr>
                              <td><label>Country</label></td> <td>{{$details[0]->country}}</td> <td><label>Province</label></td> <td>{{$details[0]->city_province}}</td> <td></td> <td></td>
                            </tr>
                            <tr>
                              <td><label>District</label></td> <td>{{$details[0]->district}}</td> <td><label>Sector</label></td> <td>{{$details[0]->sector}}</td> <td></td> <td></td>
                            </tr>
                            <tr>
                              <td><label>Cell</label></td> <td>{{$details[0]->cell}}</td> <td><label>Village</label></td> <td>{{$details[0]->village}}</td> <td></td> <td></td>
                            </tr>
                            <tr>
                              <td colspan="4">Education Background</td>
                            </tr>
                            <tr>
                              <?php $high=explode("_",$details[0]->high_school) ?>
                              <td><label>High School</label></td> <td>{{$high[0]}}</td> <td><label>Major</label></td> <td>{{$high[1]}}</td> <td><label>Qualification</label></td> <td>{{$high[2]}}</td>
                            </tr>
                            <?php if ($details[0]->program==2): ?>
                              <tr>
                                <?php $university=explode("_",$details[0]->university1) ?>
                                <td><label>University</label></td> <td>{{$university[0]}}</td>  <td><label>Major</label></td> <td>{{$university[1]}}</td> <td><label>Qualification</label></td> <td>{{$university[2]}}</td>
                              </tr>
                              <tr>
                                <?php $college=explode("_",$details[0]->college1) ?>
                                <td><label>College</label></td> <td>{{$college[0]}}</td> <td><label>Major</label></td> <td>{{$college[1]}}</td> <td><label>Qualification</label></td> <td>{{$college[2]}}</td>
                              </tr>
                              <tr>
                                <?php $seminary=explode("_",$details[0]->seminary1) ?>
                                <td><label>Seminary</label></td> <td>{{$seminary[0]}}</td> <td><label>Major</label></td> <td>{{$seminary[1]}}</td> <td><label>Qualification</label></td> <td>{{$seminary[2]}}</td>
                              </tr>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="english">
                      <div class="row">
                        <table width="100%" class="table table-striped table-hover">
                          <thead>
                            <tr>
                              <th></th> <th></th> <th></th> <th></th> <th></th> <th></th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr>
                              <?php $english=explode("_",$details[0]->english_proficiency) ?>
                              <td><label>Speaking</label></td> <td>{{$english[0]}}</td> <td><label>Reading</label></td> <td>{{$english[1]}}</td> <td><label>Writing</label> </td> <td>{{$english[1]}}</td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="reserve">
                      jsdjsd
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
  </div>
@endsection
