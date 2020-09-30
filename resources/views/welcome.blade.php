@extends('layouts.logins')
@section('form')
<div class="panel-body">
  <form role="application" action="{{ route('login') }}" method="post">
    @csrf
    <fieldset>
      <div class="form-group">
          <input class="form-control" placeholder="username" name="username" type="text" id="username" value="{{old('username')}}"autofocus>
          @error('username')
              <span class="warning-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">
          <input class="form-control" placeholder="Password" name="password" type="password" id="password">
          @error('password')
              <span class="warning-error" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
      </div>
      <div class="form-group">

      </div>
      <input type="submit" name="registerlogin" class="btn btn-lg btn-primary btn-block" value="Login">
      <center><a href=""><span style="font-size: 13px;font-weight: 700;">Password Help</span></a></center><hr>
      <strong style="color:black;">
        <label class="control-label"> You Wish to apply?</label>
        <a href="{{ route('student.application') }}"><span style="font-size: 13px;">Create Account</span></a></a>
      </strong>
    </fieldset>
  </form>
</div>
@endsection
