@extends('layouts.app')

@section('content')

<style>

href{

text-decoration: none;

}
</style>

<div class="container">
<center><h1>Sent Messages</h1></center>
<div id="accordion" class="panel-group">
  <?php  $i = 1;?>
  @foreach($sents as $value)

    <div class="panel panel-default">
        <div class="panel-heading" style="background-color:#40e0d0;color:#fff;" >
            <a class="panel-title" style="text-decoration: none;" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
                <p>Message: {{$value->message}}</p>
            </a>
        </div>
        <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
            <div class="panel-body">
                <p> Destination(s): {{$value->destination}}<br><hr> <p> Date Sent:{{$value->created_at}}</p>
                </p>
            </div>
        </div>
    </div>

</div>
 <?php   $i++; ?>
@endforeach
</div>
@endsection

@section('scripts')

<script>

$(document).ready(function(){








});



</script>


@endsection
