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
Route::redirect('/', '/home');
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
Route::get('control-panel/logout', 'LoginController@logout');
//admin
Route::redirect('control-panel', '/control-panel/posts');
Route::get('control-panel/users', 'AdminController@users_control');
//post
Route::get('control-panel/posts', 'PostController@control');
Route::get('control-panel/posts/add', 'PostController@add_view');
Route::post('control-panel/posts/add', 'PostController@add');
Route::get('control-panel/posts/delete/{id}', 'PostController@delete');
Route::get('control-panel/posts/edit/{id}', 'PostController@edit_view');
Route::post('control-panel/posts/edit/{id}', 'PostController@edit');
//user
Route::get('control-panel/users', 'UserController@control');
Route::get('control-panel/users/add', 'UserController@add_view');
Route::post('control-panel/users/add', 'UserController@add');
Route::get('control-panel/users/delete/{id}', 'UserController@delete');
Route::get('control-panel/users/edit/{id}', 'UserController@edit_view');
Route::post('control-panel/users/edit/{id}', 'UserController@edit');
