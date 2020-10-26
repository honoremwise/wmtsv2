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
          <li><a href="#"><i class="fa fa-user fa-fw"></i> settings</a>
          </li>
          <li></li>
          <li class="divider"></li>
          <li>
            <a href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout
            </a>
            <form id="logout-form" action="{{route('admission.logout')}}" method="POST" class="d-none">
                @csrf
            </form>
          </li>
      </ul>
      <!-- /.dropdown-user -->
  </li>
  <!-- /.dropdown -->
@endsection
@section('pageheading')
 <h1>Admissions officer</h1><hr>
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
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge"><?php echo count($approved); ?></div>
                          <div>Total Admitted</div>
                      </div>
                  </div>
              </div>
              <?php if (count($approved)>0): ?>
                <a href="{{route('viewadmitted')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
              <?php endif; ?>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge"><?php echo count($rejected); ?></div>
                          <div>Rejected</div>
                      </div>
                  </div>
              </div>
              <?php if (count($rejected)>0): ?>
                <a href="{{route('viewrejected')}}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
              <?php endif; ?>
          </div>
      </div>
      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge"><?php echo count($pending); ?></div>
                          <div>Submitted and pending</div>
                      </div>
                  </div>
              </div>
              <?php if (count($pending)>0): ?>
                <a href="#">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
              <?php endif; ?>
          </div>
      </div>

      <div class="col-lg-3 col-md-6">
          <div class="panel panel-primary">
              <div class="panel-heading">
                  <div class="row">
                      <div class="col-xs-3">
                          <i class="fa fa-tasks fa-5x"></i>
                      </div>
                      <div class="col-xs-9 text-right">
                          <div class="huge">{{count($candidates)}}</div>
                          <div>Not submitted</div>
                      </div>
                  </div>
              </div>
              <a href="{{route('inapplication')}}">
                  <div class="panel-footer">
                      <span class="pull-left">View Details</span>
                      <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                      <div class="clearfix"></div>
                  </div>
              </a>
          </div>
      </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="<?php if (Request::is('admissions')): ?>
                      <?php echo "active"; ?>
                    <?php endif; ?>"><a href="#applications" data-toggle="tab">Current Applications</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="home">
                      <div class="row">
                        <div class="col-lg-12">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTablesbook">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Application Number</th>
                                <th>Year submitted</th>
                                <th>Total submissions</th>
                                <th>Current Status</th>
                              </tr>
                            </thead>
                            <tbody>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade <?php if (Request::is('admissions')): ?>
                      <?php echo "in active"; ?>
                    <?php endif; ?>" id="applications">
                      <div class="row">
                        <div class="col-lg-12">
                          <table width="100%" class="table table-striped table-hover">
                            <thead>
                              <tr>
                                <th>#</th>
                                <th>Program name</th>
                                <th>Total Applications</th>
                                <th></th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>1</td>
                                <td>Bachelor's degree</td>
                                <td><?php echo count($bachelor); ?></td>
                                <td>
                                  <form action="{{route('viewapplications')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="program" value="1">
                                    <?php if (count($bachelor)>0): ?>
                                      <button type="submit" name="button" class="btn btn-primary">Detailed</button>
                                    <?php endif; ?>
                                  </form>
                                </td>
                              </tr>
                              <tr>
                                <td>2</td>
                                <td>Masters degree</td>
                                <td><?php echo count($master); ?></td>
                                <td>
                                  <form action="{{route('viewapplications')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="program" value="2">
                                    <?php if (count($master)>0): ?>
                                      <button type="submit" name="button" class="btn btn-primary">Detailed</button>
                                    <?php endif; ?>
                                  </form>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
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
