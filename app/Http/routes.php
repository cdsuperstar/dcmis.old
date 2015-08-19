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

Route::get('about', 'PagesController@about');
Route::get('/adduser', 'PagesController@adduser');
Route::get('/getc', 'PagesController@getUsercout');
Route::get('/loginmain', 'PagesController@main');
Route::get('/login', 'PagesController@login');

Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::resource('user','User\userController');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
    'dcassets'=>'dcResController'
]);
