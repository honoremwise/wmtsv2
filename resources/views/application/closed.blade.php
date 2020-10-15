@extends('layouts.logins')
@section('form')
<div class="panel-body">
  <form role="application" action="{{route('application.logout')}}" method="post">
    @csrf
    <fieldset>
      <center><label class="control-label"> Application is currently closed</label></center><hr>
    </fieldset>
  </form>
</div>
@endsection
