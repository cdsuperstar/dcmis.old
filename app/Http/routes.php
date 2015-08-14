<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', 'PagesController@index');
Route::get('about', 'PagesController@about');
Route::get('/users', 'PagesController@users');
Route::get('/adduser', 'PagesController@adduser');
Route::get('/getc', 'PagesController@getUsercout');
Route::get('/loginmain', 'PagesController@main');
Route::get('/login', 'PagesController@login');
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
//
//// Registration routes...
//Route::get('auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');
//Route::get('demo/{a}',
//    function($a){
//        return redirect('/theme/templates/admin/demo/'.$a);
//    }
//);

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

//Route::get('admin', function () {
//    return view('admin_template');
//});
Route::resource('user','User\userController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'dcassets'=>'dcResController'
]);
