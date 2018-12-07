<?php





Route::get('logout', function(){
        Session::flush();
        Auth::logout();
        return Redirect::to("/login");
    });
Route::get('/', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('/seed/create', 'SeedController@create');
Route::post('/seed/create', 'SeedController@store');
Route::get('/seed/supplierseed/{id}', 'SeedController@supplierseed');
Route::get('/seed', 'SeedController@index');
Route::post('/seed', 'SeedController@seedupdate');


Auth::routes();
Route::get('/activate-account/{token}', 'Auth\RegisterController@activateAccount');
Route::get('/resend-activation', 'Auth\RegisterController@resendActivationEmail');
Route::post('/resend-activation', 'Auth\RegisterController@resendActivationEmailToUser');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegister')->name('register');
Route::post('register', 'Auth\RegisterController@register');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
