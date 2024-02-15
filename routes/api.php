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

Route::post('/late/email','EdoStateController@lateemail');


//test mail

Route::post('/testmailer','pagesController@testmailer');

///initiatives changes

Route::put('/change','EdoStateController@primarychange');

Route::get('/changes','EdoStateController@getchanges');


//approve changes

Route::put('/approve/change','EdoStateController@approvechange');

//reject changes

Route::put('/reject/change','EdoStateController@rejectchanges');

Route::get('/checknotify','EdoStateController@checknotify');