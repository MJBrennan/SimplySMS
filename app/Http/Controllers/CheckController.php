<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;

class CheckController extends Controller
{
    
	public function index()

	{
		//return view('sms');

		if(Auth::check())
		{

			return view('sms');

		}else{
			
			return view('auth.login');
		}
	}
}
