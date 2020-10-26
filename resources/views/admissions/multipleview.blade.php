@extends('layouts.page')
@section('leftmenu')
  <li>
    <a href="{{route('admissionofficer')}}"><i class="fa fa-dashboard fa-fw"></i> My Home</a>
  </li>
@endsection
@section('pageheading')
 <h1>Applications</h1><hr>
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
                  <?php if (isset($rejected)): ?>
                    <li class="active"><a href="#applications" data-toggle="tab">Rejected Applications</a>
                    </li>
                  <?php endif; ?>
                  <?php if (isset($admitted)): ?>
                    <li class="active">
                      <a href="#admitted" data-toggle="tab">Admitted Candidates</a>
                    </li>
                  <?php endif; ?>
                  <?php if (isset($pending)): ?>
                    <li class="active">
                      <a href="#rejected" data-toggle="tab">Pending Candidates</a>
                    </li>
                  <?php endif; ?>
                  <?php if (isset($candidates)): ?>
                    <li class="active"><a href="#candidates" data-toggle="tab">Candidates</a>
                    </li>
                  <?php endif; ?>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade <?php if (isset($admitted) && Request::is('admissions/applicantsadmitted')): ?>
                      <?php echo "in active"; ?>
                    <?php endif; ?>" id="admitted">
                      <div class="row">
                        <div class="col-lg-12">
                          <?php if (isset($admitted)): ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataadmitted">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>RegNo</th>
                                  <th>Names</th>
                                  <th>Program</th>
                                  <th>Admitted date</th>
                                  <th>Current Level</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($admitted as $admit): ?>
                                  <td><?php echo $admit->id; ?></td>
                                  <td><?php echo $admit->reference_no; ?></td>
                                  <td><?php echo $admit->first_name.' '.$admit->last_name; ?></td>
                                  <td><?php echo $admit->program_name; ?></td>
                                  <td></td>
                                  <td></td>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade <?php if (isset($pending)): ?>
                      <?php echo "in active"; ?>
                    <?php endif; ?>" id="pending">
                    <div class="row">
                      <div class="col-lg-12">
                        <table width="100%" class="table table-striped table-bordered table-hover" id="datapending">
                          <thead>
                            <tr>
                              <th>#</th>
                              <th>Reference</th>
                              <th>Names</th>
                              <th>Program</th>
                              <th>Submitted date</th>
                            </tr>
                          </thead>
                        </table>
                      </div>
                    </div>
                    </div>

                    <div class="tab-pane fade <?php if (isset($candidates)): ?>
                      <?php echo "in active"; ?>
                    <?php endif; ?>" id="candidates">
                      <div class="row">
                        <div class="col-lg-12">
                          <?php if (isset($candidates) && count($candidates)>0): ?>
                            <table width="100%" class="table table-striped table-bordered table-hover" id="datacandidates">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Reference No</th>
                                  <th>Names</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($candidates as $candidate): ?>
                                  <tr>
                                    <td>{{$candidate->id}}</td>
                                    <td>{{$candidate->application_referrence_no}}</td>
                                    <td><?php echo $candidate->first_name." ".$candidate->last_name; ?></td>
                                    <td></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade <?php if (isset($rejected) && Request::is('admissions/applicantsrejected')): ?>
                      <?php echo " in active"; ?>
                    <?php endif; ?>" id="applications">
                      <div class="row">
                        <div class="col-lg-12">
                          <?php if (isset($rejected) && Request::is('admissions/applicantsrejected')): ?>
                            <table width="100%" class="table table-striped table-hover" id="rejected">
                              <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Name</th>
                                  <th>Email</th>
                                  <th>National/Passport Number</th>
                                  <th>Program</th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php foreach ($rejected as $reject): ?>
                                  <tr>
                                    <td><?php echo $reject->id; ?></td>
                                    <td><?php echo $reject->first_name." ".$reject->last_name; ?></td>
                                    <td><?php echo $reject->email; ?></td>
                                    <td><?php echo $reject->program; ?></td>
                                  </tr>
                                <?php endforeach; ?>
                              </tbody>
                            </table>
                          <?php endif; ?>
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
