
@extends('layouts.app')

@section('content')
<center>
<h1>Where would you like to select your numbers From?</h1><br>
<p>Enter in manually</p>
<a href="{{url('manualentry')}}"  class="btn btn-primary">Manually</a><br>
<p>Retrieve from Microsoft Contacts</p><br>
<a href="{{url('microsoftcontacts')}}" type="button" class="btn btn-primary">Microsoft</a>
</center>
@endsection