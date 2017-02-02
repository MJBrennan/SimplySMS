@extends('layouts.app')

@section('content')

<div class="container">

<div id="accordion" class="panel-group">
  <?php  $i = 1;?>
  @foreach($sents as $value)

    <div class="panel panel-default">
        <div class="panel-heading">
            <a class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
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
