<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;

class ContactsController extends Controller
{
    

	public function index()
	{

	if(Auth::check())
		{
			return view('which');
		}else{
			return view('auth.login');
		}
	}

	public function savingSession(Request $request)
	{
		$data = $request->sarr;
		$request->session()->put('numbers', $data);
		
		return "Done";
	}


	public function filter(Request $request)
	{
		$data = $request->sarr;
		//$data = json_decode($data);
		
		$count = count($data);
		$arr = array();
		for($i=0;$i<$count;$i++)
		{
		$input = $data[$i];
		$removeNonNums = preg_replace("/[^0-9,.]/","",$input);
		array_push($arr, $removeNonNums);
		}

		return $arr;
	}
}
