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
//page
Route::redirect('/', 'home');
Route::get('home', 'PageController@posts');
Route::get('about', function () {
  return view('about');
});
Route::get('resume', 'PageController@resume');
Route::get('login', function (){
  return view('login');
});
Route::get('contact', function (){
  return view('contact');
});
Route::get('projects', 'PageController@projects');
//login
Route::post('login', 'LoginController@doLogin');
Route::get('logout', 'LoginController@logout');
//admin
Route::get('control-panel', 'AdminController@home');
Route::get('control-panel/posts', 'AdminController@posts_control');
Route::get('control-panel/users', 'AdminController@users_control');
