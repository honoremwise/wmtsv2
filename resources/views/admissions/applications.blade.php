@extends('layouts.page')
@section('leftmenu')
  <li>
    <a href="{{route('admissionofficer')}}"><i class="fa fa-dashboard fa-fw"></i> My Home</a>
  </li>
@endsection
@section('pageheading')
 <h1>Submitted Applications|<?php echo DB::table('programs')->where('id',$program)->value('program_name');?></h1><hr>
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
                    <li class="active"><a href="#applications" data-toggle="tab">Current Applications</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="home">
                      <div class="row">
                        <div class="col-lg-12">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTablesbook">
                            sdf
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade in active" id="applications">
                      <div class="row">
                        <div class="col-lg-12">
                          <table width="100%" class="table table-striped table-hover" id="application">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>National/Passport Number</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($applications as $app): ?>
                                <tr>
                                  <td><?php echo $app->id; ?></td>
                                  <td>
                                    <?php $fname=DB::table('candidates')->where('application_referrence_no',$app->reference_no)->value('first_name'); ?>
                                    <?php $last=DB::table('candidates')->where('application_referrence_no',$app->reference_no)->value('last_name') ?>
                                    <?php echo $fname.' '.$last;?>
                                  </td>
                                  <td><?php echo DB::table('candidates')->where('application_referrence_no',$app->reference_no)->value('email'); ?></td>
                                  <td><?php echo DB::table('candidates')->where('application_referrence_no',$app->reference_no)->value('nid_passport_number'); ?></td>
                                  <td>
                                    <form action="{{route('admission.details')}}" method="post">
                                      @csrf
                                      <input type="hidden" name="candidate" value="{{$app->reference_no}}">
                                      <button type="submit" name="buttondetails" class="btn btn-primary">Details</button>
                                    </form>
                                  </td>
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
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
