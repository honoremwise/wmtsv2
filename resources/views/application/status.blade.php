@extends('layouts.logins')
@section('form')
<div class="panel-body">
  <form role="application" action="{{route('application.logout')}}" method="post">
    @csrf
    <fieldset>
      <center><label class="control-label"> Application is submitted</label></center><hr>
      <center><button type="buttonlogout" class="btn btn-link"><span style="font-size: 13px;font-weight: 700;">Logout</span></button> </center>
    </fieldset>
  </form>
</div>
@endsection
