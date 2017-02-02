@extends('layouts.app')

@section('content')

<div id="container">

<input placeholder="Enter Here" name="input[]"></input><br>
<input placeholder="Enter Here" name="input[]"></input><br>
<input placeholder="Enter Here" name="input[]"></input><br>
<input placeholder="Enter Here" name="input[]"></input><br>
<input placeholder="Enter Here" name="input[]"></input><br>
</div>
<button id="addbutton" style="width:120px;height:30px;">Add More Fields</button><br>
<button id="continue" style="width:120px;height:30px;">Done</button><br>
</body>



@section('scripts')

<script>

$(document).ready(function()
{
	$("#addbutton").click(function(){

		$("#container").append("<input placeholder='Enter Here' name='input[]''></input><br>")
	});

	$("#continue").click(function(){

		 var values = $('input[name="input[]"]').map(function(){
      	 return this.value
         }).get();
         var val = values.filter(Boolean);
         console.log(val);
	});
});





</script>




@endsection
