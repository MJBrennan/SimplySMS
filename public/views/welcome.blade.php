@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
            <img src="resources/assets/img/sms.jpg" class="img img-rounded"></img>  
            <a href="{{action('ContactsController@index')}}" class="btn btn-primary">Get Started</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
