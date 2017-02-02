<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Twilio\Rest\Client;
use App\Sent;
use Illuminate\Support\Facades\Auth;


class SessionController extends Controller
{
    
	public function about()
	{
		$arr = $_POST["des"];
		$implode = implode(", ", $arr);

	//	var_dump($arr);
		try{
		$sms = new Client('ACdf4019b61b4f9d3a4052b950796ad9bc','8b9805023a36c56fa2638f96dc6a2144');
		$sms->account->messages->create($arr, array("from"=>"353861802795","body"=>$_POST["message"]));
		$blogData = new Sent;
		$blogData->destination = $implode;
		$blogData->message = $_POST["message"];
		if($sms)
		{
			$blogData->status = "Success";
			Auth::user()->messages()->save($blogData);
			return "Text Sent";
		}
		else
		{
			$blogData->status = "Fail";
			Auth::user()->messages()->save($blogData);
			return "Not Sent";
		}
	}catch(Execption $e){

		var_dump($e);

			}
		}
	}


