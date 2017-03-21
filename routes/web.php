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

Route::get('/', function () {
    return view('home');
});

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('auth.login');
Route::get('/logout', 'Auth\LoginController@logout');

// Registration Routes...
Route::get('/register', 'Auth\RegisterController@showRegistrationForm');
$this->post('register', 'Auth\RegisterController@register')->name('auth.register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('auth.password.email');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');


Route::group(['middleware' => 'auth'], function () {// Authentication Routes...

    Route::get('/home', 'HomeController@index');

    Route::get('/', 'HomeController@index');

    Route::resource('injuries', 'InjuriesController');

    Route::resource('comments', 'CommentsController');

    Route::resource('accidents', 'AccidentsController');

    Route::resource('biologicals', 'BiologicalsController');

    Route::resource('hazmat', 'HazmatController');

    Route::resource('users', 'UserController');

    Route::resource('adminpanel', 'AdminpanelsController');

    Route::get('biologicals/{id}/Approve', 'BiologicalsController@Approve');

    Route::get('biologicals/{id}/Reject', 'BiologicalsController@Reject');

    Route::get('injuries/{id}/Approve', 'InjuriesController@Approve');

    Route::get('injuries/{id}/Reject', 'InjuriesController@Reject');

    Route::get('accidents/{id}/Approve', 'AccidentsController@Approve');

    Route::get('accidents/{id}/Reject', 'AccidentsController@Reject');









});



Auth::routes();

