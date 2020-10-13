@extends('layouts.account')
@section('leftmenu')
  <li>
    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Academics Affaires<span class="fa arrow"></span></a>
    <ul class="nav nav-second-level">
        <li>
            <a href="#" data-toggle="modal" data-target="#myapplication">Application Dates</a>
        </li>
    </ul>
  </li>
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
            <a href="{{ route('admin.logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();"><i class="fa fa-sign-out fa-fw"></i> Logout
            </a>
            <form id="logout-form" action="{{route('admin.logout')}}" method="POST" class="d-none">
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
 <h1>Welcome Admin</h1><hr>
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
                    <li class="active"><a href="#users" data-toggle="tab">Manage Users</a>
                    </li>
                    <li><a href="#roles" data-toggle="tab">Users Roles</a> </li>
                    <li><a href="#academic" data-toggle="tab">Academic Affaires</a> </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade" id="roles">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <h4>
                                <a data-toggle="collapse" data-parent="#accordionrole" href="#collapserole">Add New Role</a>
                              </h4>
                              <div class="panel-body">
                                <div id="collapserole" class="panel-collapse collapse">
                                  <form action="{{route('admin.role')}}" method="post">
                                    @csrf
                                    <div class="form-group">
                                      <input type="text" name="rolename" value="" id="rolename" class="form-control" placeholder="New role">
                                    </div>
                                    <div class="form-group">
                                      <button type="submit" name="buttonrole" class="btn btn-primary btn-sm btn-block">Save</button>
                                    </div>
                                  </form>
                                </div>
                                <table class="table table-striped table-bordered table-hover">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Role name</th>
                                      <th>Registered date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (count($roles)): ?>
                                      <?php foreach ($roles as $role): ?>
                                        <tr>
                                          <td>{{$role->id}}</td>
                                          <td>{{$role->role_name}}</td>
                                          <td>{{$role->created_at}}</td>
                                        </tr>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="tab-pane fade" id="academic">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="panel-body">
                                <?php if (count($apply)>0): ?>
                                  <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                      <tr>
                                        <th>#</th>
                                        <th>University Program</th>
                                        <th>Application started</th>
                                        <th>Application ended</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                      <?php foreach ($apply as $schedule): ?>
                                        <tr>
                                          <td><?php echo $schedule->id; ?></td>
                                          <td>
                                            <?php echo DB::table('programs')->where('id',$schedule->program_id)->value('program_name');?>
                                          </td>
                                          <td><?php echo $schedule->application_start_date; ?></td>
                                          <td><?php echo $schedule->application_close_date; ?></td>
                                        </tr>
                                      <?php endforeach; ?>
                                    </tbody>
                                  </table>
                                <?php endif; ?>
                                <?php if (!empty($apply)): ?>
                                  <form action="{{route('admin.schedule')}}" method="post">
                                    @csrf
                                    <div class="form-group col-md-12">
                                      <label>Add New</label>
                                      <select class="form-control" name="program">
                                        <option value="">select a program</option>
                                        <?php foreach ($programs as $pro): ?>
                                          <option value="<?php echo $pro->id ?>"><?php echo $pro->program_name; ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>Start Date</label>
                                      <input type="date" name="startdate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                      <label>End Date</label>
                                      <input type="date" name="enddate" class="form-control">
                                    </div>
                                    <div class="form-group col-md-12">
                                      <button type="submit" name="buttonapplication" class="btn btn-primary btn-block">Save</button>
                                    </div>
                                  </form>
                                <?php endif; ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade in active" id="users">
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="panel panel-default">
                            <div class="panel-heading">
                              <div class="panel-body">
                                <table class="table table-striped table-bordered table-hover" width="100%">
                                  <thead>
                                    <tr>
                                      <th>#</th>
                                      <th>Names</th>
                                      <th>Email</th>
                                      <th>Role</th>
                                      <th>Registered date</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php if (count($users)>0): ?>
                                      <?php foreach ($users as $user): ?>
                                        <tr>
                                          <td>{{$user->id}}</td>
                                          <td>{{$user->name}}</td>
                                          <td>{{$user->email}}</td>
                                          <td>{{$user->role_id}}</td>
                                          <td>{{$user->created_at}}</td>
                                        </tr>
                                      <?php endforeach; ?>
                                    <?php endif; ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
          <!-- /.panel-body -->
          <div class="modal fade" id="myapplication" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Current Application dates</h4>
                      </div>
                      <div class="modal-body">

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      </div>
                  </div>
                  <!-- /.modal-content -->
              </div>
              <!-- /.modal-dialog -->
          </div><!--end of modal -->
        </div>
        <!-- /.panel -->
    </div>
  </div>
@endsection
