@extends('layouts.app')

@section('content')

<?php 
	if(session()->has('numbers'))
	{
		session()->forget('numbers');
	}
 ?>

<style>


</style>

<div class="row">

<div  id="container" style="width:90%; padding-left:40px;">
<center><h4 id="banner">Enter Contacts:</h4></center>
<input class="form-control" name="input[]"></input><br>
<input class="form-control" name="input[]"></input><br>
<input class="form-control" name="input[]"></input><br>
<input class="form-control" name="input[]"></input><br>
<input class="form-control" name="input[]"></input><br>
</div>

<div >
<center><button id="addbutton" class="btn btn-primary">Add More Fields</button><br></center>
<br>
<center><button id="continue" class="btn btn-primary">Done</button><br></center>

</div>

</div>

@endsection
@section('scripts')

<script>

$(document).ready(function()
{
	$("#addbutton").click(function(){

		$("#container").append("<input class='form-control' name='input[]''></input><br>")
	});

	$("#continue").click(function(){

		 var values = $('input[name="input[]"]').map(function(){
      	 return this.value
         }).get();
         
         var val = values.filter(Boolean);

        $.ajaxSetup({
     	headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	}
        });
         
        $.ajax({  url:"session", data: {sarr: val}, method:"post",success:function(data)
	         	    {
	         	  	console.log(data);
	         	  	window.location.replace("{{url('smsview')}}");

	         	    }

         		});

        	});
	    });


			


</script>

@endsection