<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::auth();

Route::get('/home', function () {

    return view('welcome');

});

Route::post('/smsTransaction', 'SessionController@about');

Route::get('Texting','CheckController@index');

Route::get('List', 'ViewController@index');

Route::get('select','ContactsController@index');


Route::get('manualentry', function(){
	return view('manual');
});

Route::get('listmessages', function(){
	return view('list');
});

Route::get('microsoftcontacts', function(){
	return view('microsoft');
});



Route::get('smsview', function(){
	return view('sms');
});


Route::post('/session','ContactsController@savingSession');


Route::post('/arrayfilter','ContactsController@filter');








