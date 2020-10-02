@extends('layouts.account')
@section('leftmenu')
  <p></p>
@endsection
@section('pageheading')
 <h1>Study Application</h1><hr>
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
            <div class="panel-heading">
                <h4>Bachelor Student Application</h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#home" data-toggle="tab">Basic Data</a>
                    </li>
                    <li><a href="#place" data-toggle="tab">Living place</a> </li>
                    <li><a href="#profile" data-toggle="tab">Language proficiency</a>
                    </li>
                    <li><a href="#messages" data-toggle="tab">Education Background</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">Medical History</a>
                    </li>
                    <li><a href="#settings" data-toggle="tab">Documents uploads</a>
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
                          <div class="form-group col-md-12 col-lg-12">
                            Place of Birth <hr>
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
                    <div class="tab-pane fade" id="profile">
                        <h4>Profile Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="messages">
                        <h4>Messages Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                    <div class="tab-pane fade" id="settings">
                        <h4>Settings Tab</h4>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    </div>
                </div>
            </div>
            <!-- /.panel-body -->
        </div>
        <!-- /.panel -->
    </div>
  </div>
@endsection
