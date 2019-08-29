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
    


//Route::post('/logout','UserController@logoutApi')->name('islogout');
Route::resource('groups', 'GroupController');
Route::resource('invitations', 'InvitationController');

// public routes
Route::post('/login', 'Api\AuthController@login')->name('login.api');
Route::post('/register', 'Api\AuthController@register')->name('register.api');

// private routes
Route::middleware('auth:api')->group(function () {
    Route::post('/logouts', 'Api\AuthController@logout')->name('logout');
    Route::post('/secureLogout', 'UserController@logout')->name('securelogout');
});