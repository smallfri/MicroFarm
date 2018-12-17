<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();

Route::get('/', 'HomeController')->name('home');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::get('logout', function(){
    Session::flush();
    Auth::logout();
    return Redirect::to("/login");
});
// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

Route::get('/activate-account/{token}', 'Auth\RegisterController@activateAccount');
Route::get('/resend-activation', 'Auth\RegisterController@resendActivationEmail');
Route::post('/resend-activation', 'Auth\RegisterController@resendActivationEmailToUser');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

// Mail Routes
Route::post ('seed/summary-delete-all', 'SeedController@summaryDeleteAll')->name('summary-delete-all');
Route::post ('seed/summary-update', 'SeedController@summaryUpdate')->name('summary-update');
Route::get ('seed/summary', 'SeedController@seedSummary')->name('seed-summary');
Route::post ('seed/detail/{variety_id}', 'SeedController@seedDetail')->name('seed-detail');
Route::get('seed/create', 'SeedController@create')->name('seed/create');
Route::post('seed/create', 'SeedController@store');
Route::get('seed/supplierseed/{id}', 'SeedController@supplierseed');
Route::get('seed', 'SeedController@index')->name('seed');
Route::get('seed', 'SeedController@index')->name('seed');
Route::post('seed', 'SeedController@seedupdate');
