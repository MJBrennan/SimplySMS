@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-body">
            <center><img src="img/sms.jpg" class="img img-rounded" style="width:100px;height:100px;"></img><br>
            <p>Simply SMS is a tool that allows you to send bulk SMS messages to everyone. Built with PHP with Laravel</p>
            <a href="{{action('ContactsController@index')}}" class="btn btn-primary" "">Get Started</a>
                </div></center>
            </div>
        </div>
    </div>
</div>
@endsection
