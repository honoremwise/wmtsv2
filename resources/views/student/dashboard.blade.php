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
 <h1>Welcome <?php echo auth()->user()->last_name." ".auth()->user()->first_name;?></h1><hr>
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
                      <a href="#home" data-toggle="tab">Home</a>
                    </li>
                    <li><a href="#" data-toggle="tab">Home</a></li>
                    <li><a href="#" data-toggle="tab">Home</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane fade in active" id="home">
                      <div class="row">
                        <div class="col-lg-12">
                          <table width="100%" class="table table-striped table-bordered table-hover" id="dataTablesbook">
                            sdf
                          </table>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="applications">
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
