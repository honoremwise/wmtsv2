@extends('layouts.page')
@section('leftmenu')
  <li>
    <a href="{{route('admin.dashboard')}}"><i class="fa fa-dashboard fa-fw"></i>Dashboard</a>
  </li>
@endsection
@section('pageheading')
 <h1>Admin User</h1><hr>
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
                    <li class="active">
                      <a href="#home" data-toggle="tab">New User</a>
                    </li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                      <div class="row">
                        <form action="index.html" method="post">
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Names</label>
                            <input type="text" name="" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Email Address</label>
                            <input type="text" name="" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Telephone</label>
                            <input type="text" name="" value="" class="form-control">
                          </div>
                          <div class="form-group col-md-6 col-lg-6">
                            <label>Role</label>
                            <select class="form-control" name="">

                            </select>
                          </div>
                          <div class="form-group col-md-12 col-lg-12">
                            <button type="submit" name="newuser" class="btn btn-primary btn-block">Save</button>
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
