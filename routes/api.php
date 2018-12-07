<?php
return;
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

Route::group(['prefix' => 'v1.0/', 'namespace' => 'Api'], function () {

    Route::post('user/login', 'UsersController@login');
    Route::post('user/facebooklogin', 'UsersController@facebooklogin'); 
    Route::post('user/forgot', 'UsersController@forgot');
    Route::post('user/registration', 'UsersController@register');
    Route::get('user/countrylist', 'UsersController@countrylist');
    Route::post('user/checkfbuser', 'UsersController@checkfbuser');
    
});

Route::group(['prefix' => 'v1.0', 'middleware' => ["api_pass"], 'namespace' => 'Api'], function () {
    //Users;
    Route::post('user/changepassword', 'UsersController@changePassword');
    Route::post('user/update', 'UsersController@update');
    Route::post('user/logout', 'UsersController@logout');
    //Goals
    Route::post('goal/addgoal', 'GoalsController@addgoal');
    Route::post('goal/editgoal', 'GoalsController@editgoal');
    Route::get('goal/goallist', 'GoalsController@goallist');
    //Route::get('goal/activategoallist', 'GoalsController@activategoallist');
    //Route::get('goal/completegoallist', 'GoalsController@completegoallist');
    //Route::get('goal/expiregoallist', 'GoalsController@expiregoallist');
    Route::get('goal/suggetion', 'GoalsController@suggetion');
});
