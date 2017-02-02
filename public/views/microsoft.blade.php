@extends('layouts.app')
@section('content')

<?php 



	if(session()->has('numbers'))
	{
		session()->forget('numbers');
	}

 ?>

<div class="col-md-10 col-md-offset-1">
<a href="#" id="contacts">Click Here</a>
<center><h4 id="banner" style="display:none;">Select Contacts:</h4></center>
<div id="listitem">
<ol></ol>
</div>
<center><button id="addtoarray" style="display: none;" class="btn btn-primary">Continue</button></center>
</div>
@endsection
@section('scripts')
<script src="//js.live.net/v5.0/wl.js"></script>

<script>

WL.init({
    client_id: "00000000441B766C",
    redirect_uri: "http://mikesmaindev.area/sms-app/public/microsoftcontacts",
    scope: ["wl.basic", "wl.contacts_emails"],
    response_type: "token"
});



		$(document).ready(function()
		{

			$("#contacts").click(function(e){

				e.preventDefault();

			WL.login({
	        scope: ["wl.basic", "wl.contacts_phone_numbers"]
	    	}).then(function (response) 

	    {
			WL.api({
	            path: "me/contacts",
	            method: "GET"
	        }).then(
	            function (response) {
                        //your response data with contacts 
	          var jsonArr = JSON.stringify(response.data,null, 4);
	    
	         var json = $.parseJSON(jsonArr);
      		  //now json variable contains data in json format
       		 //let's display a few items
      		  for (var i=0;i<json.length;++i)
       		 {

         	  // console.log(json[i].name + " and " + json[i].phones.mobile);
         	  $("#listitem").append("<li class='list-group-item'><input type='checkbox' value =' "+json[i].name + json[i].phones.mobile  +"'>" + json[i].name + ": " + json[i].phones.mobile + "</li>");

         	  var jarr =  [json[i].name , json[i].phones.mobile];

         	
       	    }
       	    $('#contacts').hide();
       	    $('#addtoarray').show();
       	    $('#banner').show();

			
	  
	            },
	            function (responseFailed) {
	            	//console.log(responseFailed);
	            }
	        );
	        
	    },

	    function (responseFailed) 
	    {
	        console.log("Error signing in: " + responseFailed.error_description);
	    				});
				}); 

			$("#addtoarray").click(function()
			{

				var searchIDs = $('input:checked').map(function(){

      			return $(this).val();

    			});

    			console.log(searchIDs);
    		
    			var sID = searchIDs.get();

    			$.ajaxSetup({
     			 headers: {
    		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      				}
        			});


     			$.ajax({  url:"session", data: {sarr: sID}, method:"post",success:function(data)
	         	    {
	         	  	console.log(data);
	         	    window.location.replace("{{url('smsview')}}");

	         	    }

         			});
				});

			});
	







</script>


@endsection