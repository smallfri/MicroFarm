<?php
//Route::auth();

//Route::get('logout', function(){
//        Session::flush();
//        Auth::logout();
//        return Redirect::to("/login");
//    });
Route::get('/', 'HomeController@index')->name('home');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@authenticate');
Route::get('/seed/create', 'SeedController@create');
Route::post('/seed/create', 'SeedController@store');
Route::get('/seed/supplierseed/{id}', 'SeedController@supplierseed');
Route::get('/seed', 'SeedController@index');
Route::post('/seed', 'SeedController@seedupdate');
//
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');

//// Registration Routes...
//$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
//$this->post('register', 'Auth\RegisterController@register');
//
//// Password Reset Routes...
//$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
//$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
//$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
//$this->post('password/reset', 'Auth\ResetPasswordController@reset');
//
//Route::get('/activate-account/{token}', 'Auth\RegisterController@activateAccount');
//Route::get('/resend-activation', 'Auth\RegisterController@resendActivationEmail');
//Route::post('/resend-activation', 'Auth\RegisterController@resendActivationEmailToUser');
//Route::group(['middleware' => ['auth', 'admin']], function () {
//        Route::get('/home', 'HomeController@index')->name('home');
//        Route::get('logout', function(){
//        Session::flush();
//        Auth::logout();
//            return Redirect::to("/home");
//            });
//        Route::get('/', function (){
//            return view('auth.login');
//            });
//        Route::get('/admin', 'Admin\AdminController@index');
//        Route::group(['prefix' => 'admin'], function () {
//        Route::get('/', 'Admin\AdminController@index');
//
//        //generator
//        Route::get('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@getGenerator']);
//        Route::post('/generator', ['uses' => '\Appzcoder\LaravelAdmin\Controllers\ProcessController@postGenerator']);
//
//
//        //Role Permission
//        Route::resource('/permissions', 'Admin\PermissionsController');
//        Route::get('/give-role-permissions', 'Admin\AdminController@getGiveRolePermissions');
//        Route::post('/give-role-permissions', 'Admin\AdminController@postGiveRolePermissions');
//
//        //users
//        Route::resource('/users', 'Admin\UsersController');
//        Route::get('/users/create', 'Admin\UsersController@create');
//        Route::get('/users/{id}/edit', 'Admin\UsersController@edit');
//        Route::get('/usersdata', ['as' => 'UsersControllerUsersData', 'uses' => 'Admin\UsersController@datatable']);
//        //my profile
//        Route::get('/profile', 'Admin\ProfileController@index')->name('profile.index');
//        Route::get('/profile/edit', 'Admin\ProfileController@edit')->name('profile.edit');
//        Route::patch('/profile/edit', 'Admin\ProfileController@update');
//        Route::get('/profile/changepassword', 'Admin\ProfileController@changePassword')->name('profile.changepassword');
//        Route::patch('/profile/changepassword', 'Admin\ProfileController@updatePassword');
//
//         //Seeds
//        Route::resource('/seeds', 'Admin\SeedsdetailController');
//        Route::get('/seedsdata', ['as' => 'SeedsData', 'uses' => 'Admin\SeedsdetailController@datatable']);
//
//        //Supplier
//        Route::resource('/supplier', 'Admin\SupplierController');
//        Route::get('/suppliersdata', ['as' => 'SuppliersData', 'uses' => 'Admin\SupplierController@datatable']);
//
//        //Variety
//        Route::resource('/variety', 'Admin\VarietyController');
//        Route::get('/varietydata', ['as' => 'VarietyData', 'uses' => 'Admin\VarietyController@datatable']);
//
//         // contact us
//        Route::resource('/contact', 'Admin\ContactController');
//        Route::get('/contactData', ['as' => 'contactData',
//         'uses' => 'Admin\ContactController@datatable']);
//
//         // Setting
//        Route::resource('/setting', 'Admin\SettingController');
//    });
//
//});
//
//
//Route::get('/', 'HomeController@index')->name('home');
//
// //Contact
//Route::resource('/contact', 'ContactController');
//
//Route::group(['middleware' => ['auth']], function () {
//
//Route::get('/dashboard', 'FarmhouseController@dashboard');
//Route::get('/profile', 'ProfileController@edit');
//Route::get('/profile/view', 'ProfileController@show');
//Route::post('/profile', 'ProfileController@update');
//Route::get('/profile/change-password', 'ProfileController@changePassword')->name('profile.password');
//Route::patch('/profile/change-password', 'ProfileController@updatePassword');
//Route::get('/seed/create', 'SeedController@create');
//Route::post('/seed/create', 'SeedController@seedupdate');
//Route::get('/seed/supplierseed/{id}', 'SeedController@supplierseed');
//Route::get('/seed', 'SeedController@index');
//Route::post('/seed', 'SeedController@seedupdate');
//Route::post('/seed/edit/{id}', 'SeedController@update');
//Route::get('/seed/edit/{id}', 'SeedController@edit');
//
//});
//

//
//Route::group(['prefix' => 'admin'], function () {
//    Voyager::routes();
//});