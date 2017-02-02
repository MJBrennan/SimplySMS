
@extends('layouts.app')

@section('content')
	

	<?php
	 $value = session('numbers');
	?>
	<div id="conn" class="container">
	<p>Sending to:</p>




	</div>

	<label for="inputEmail3" class="col-sm-2 col-form-label">Message</label>
	<div class="col-sm-10">
	<textarea class="form-control" id="message" placeholder="Text" rows="3"></textarea>
	<br>
	<button id="but" class="btn btn-primary">Send</button>
	</div>
	</div>

</div>
<div class="modal fade" id="modalsuccess" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <a href="{{url('List')}}" class="btn btn-primary" type="button" >View Sent Messages</a>
      </div>
    </div>
  </div>
</div>


@endsection

@section('scripts')

<script>

$(document).ready(function(){

	 var arr = [];
	 arr = <?php echo json_encode($value);?>;
	arr = arr.filter(function(element)
	{
		return element !== undefined;
	});
	$.ajaxSetup({
     	 headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	}
        });

	$.ajax({ method:"POST", url:"arrayfilter", data: {sarr: arr},success:function(data)
		{
		arr = data;
		}
    });

    console.log(arr);

    for(i=0;i<=print.length;i++){
		$("#conn").append("<p>" + arr[i] + "</p>");
	}

	$('#but').click(function(){
	var message = $("#message").val();
	$.ajaxSetup({
     	 headers: {
    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      	}
        });

	 $.ajax({  
		    method: "POST",
		    url: 'smsTransaction',
		    data: {"des": arr , "message": message},
		    success: function(result){
		      if(result === "Text Sent"){
		       $('#modalsuccess').modal('show');
		      }else{
		        alert("Text Not Sent Please Try Again Later");
		     	 }
		  	  },
		  	  error: function(){
		  	  	alert("Message Not Sent");
		  	  }
			});
	});
});



</script>


@endsection



