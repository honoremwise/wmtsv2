@extends('layouts.logins')
@section('form')
<div class="panel-body">
  <form role="application" action="{{ route('admin.login.submit') }}" method="post">
    @csrf
    <fieldset>
      <div class="form-group">
          <input class="form-control" placeholder="email" name="email" type="text" id="email" value="{{old('email')}}"autofocus required>
          @error('email')
              <span class="warning-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
          <input class="form-control" placeholder="Password" name="password" type="password" id="password" required>
          @error('password')
              <span class="warning-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <input type="submit" name="adminlogin" class="btn btn-lg btn-primary btn-block" value="Login">
      <center><a href=""><span style="font-size: 13px;font-weight: 700;">Password Help</span></a></center><hr>
    </fieldset>
  </form>
</div>
@endsection
