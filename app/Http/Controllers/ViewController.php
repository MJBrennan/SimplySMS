<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Sent;
use DB;


class ViewController extends Controller
{
    
	public function index()
	{
		if(Auth::check())
		{	

		$auth = Auth::id();
		

		 $sents = DB::table('sents')->where('user_id',$auth)->get();

        return view('list', ['sents' => $sents]);


		
		

		}else

		{
			return view('auth.login');
		}
		

	}
}
