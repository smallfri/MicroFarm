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
//Auth::routes();

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
Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');

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
Route::get('duplicate/{user_seed_id}/{user_seed_detail_id}', 'SeedController@duplicate');


// Inventory Routes
Route::get ('inventory', 'InventoryController@index')->name('inventory');
Route::get ('metrics/create', 'InventoryController@metricsCreate')->name('metrics-create');
Route::post ('metrics/create', 'InventoryController@metricsStore')->name('metrics-store');


Route::get ('inventory/create', 'InventoryController@inventoryCreate')->name('inventory-create');
Route::post ('inventory/create', 'InventoryController@inventoryStore')->name('inventory-store');

Route::get ('location/create', 'InventoryController@locationCreate')->name('location-create');
Route::post ('location/create', 'InventoryController@locationStore')->name('location-store');

Route::get ('inventory/manage', 'InventoryController@manage')->name('inventory-manage');
Route::post ('inventory/manage', 'InventoryController@manageStore')->name('inventory-store');

Route::post ('inventory/manage/{isid}', 'InventoryController@addQuantity')->name('quantity_add');

Route::get ('inventory/category', 'InventoryController@category')->name('category-create');
Route::post ('inventory/category', 'InventoryController@categoryStore')->name('category-store');

Route::get ('inventory/item', 'InventoryController@item')->name('item-create');
Route::post ('inventory/item', 'InventoryController@itemStore')->name('item-store');


