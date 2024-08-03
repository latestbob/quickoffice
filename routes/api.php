<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/myapi','pagesController@myapi');

Route::delete('/deletemeetings','pagesController@deleteallmeetings');


Route::post('/mdaintitiative','EdoStateController@addinitiative');

Route::get('/mdas','EdoStateController@getinitiative');

Route::get('/mdas/unique','EdoStateController@getunique');


Route::put("/update/initiative","EdoStateController@updateinitiative");

Route::get('/mda/summary','EdoStateController@mdasummary');

Route::get('/completionrate','EdoStateController@completionrate');

Route::get('/late/email','EdoStateController@lateemail');


//test mail

Route::post('/testmailer','pagesController@testmailer');

///initiatives changes

Route::get('/change','EdoStateController@primarychange');

Route::get('/changes','EdoStateController@getchanges');


//approve changes

Route::put('/approve/change','EdoStateController@approvechange');

//reject changes

Route::put('/reject/change','EdoStateController@rejectchanges');

Route::get('/checknotify','EdoStateController@checknotify');

Route::post('/sendmda','EdoStateController@sendmdamail');

//admin change


Route::get('/excutive/change','EdoStateController@executivechange'); //all changes

Route::get('/change/unique','EdoStateController@changeunique');


//Delete PHC

Route::delete('/delete/work','EdoStateController@deletephc');

Route::post('/sendmdasummary','EdoStateController@sendmdasummary');

//get unique mda initiative and order by objectives
Route::get('/mdaobjectives','EdoStateController@mdaobjectives');