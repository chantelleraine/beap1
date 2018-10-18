<?php

use Illuminate\Http\Request;

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


//CALAMITIES

//LIST CALAMITIES
Route::get('/calamities', 'API\PostsAPIController@index');

//LIST SINGLE CALAMITY
route::get('calamity/(id)', 'API\PostsAPIController@show');