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
    return view('welcome');
});

Route::get('/cv', 'ResumeController@show');
Route::get('/cv/upload', 'ResumeController@showUpload');
Route::post('/cv/upload', 'ResumeController@upload');
Route::get('/about', 'AboutController@show');
Route::get('/projects', 'ProjectsController@show');
Route::get('/skills', 'SkillsController@show');
Route::get('/contact', 'ContactController@show');
Route::get('/login', 'UsersController@showLogin');
Route::post('/login', 'UsersController@login');
Route::get('/logout', 'UsersController@logout');
Route::get('/logs', 'LogsController@list');
Route::get('/skills/new', 'SkillsController@showNew');
Route::get('/users', 'UsersController@list');
Route::get('/users/new', 'UsersController@showNew');
Route::post('/users/new', 'UsersController@create');
Route::get('/users/delete/{id}', 'UsersController@delete');
Route::get('/users/edit/{id}', 'UsersController@showEdit');
Route::post('/users/edit/{id}', 'UsersController@update');
Route::get('/users/{id}', 'UsersController@showProfile');
Route::post('/skills/new', 'SkillsController@create');
Route::post('/skills/delete', 'SkillsController@delete');
Route::get('/categories/new', 'CategoriesController@showNew');
Route::post('/categories/new', 'CategoriesController@create');
Route::get('/blogs/new', 'BlogsController@showNew');
Route::post('/blogs/new', 'BlogsController@create');
Route::post('/blogs/edit','BlogsController@update');
Route::get('/blogs', 'BlogsController@showAll');
Route::post('/blogs/comment', 'BlogsController@comment');
Route::get('/blog/edit/{id}','BlogsController@showEdit');
Route::get('/blog/delete/{id}', 'BlogsController@delete');
Route::get('/blogs/{id}','BlogsController@showSingle');
Route::get('/comments/delete/{id}', 'BlogsController@deleteComment');
Route::get('/profile', 'UsersController@showEditProfile');
Route::post('/profile/edit', 'UsersController@editProfile');
Route::post('/mail','MailController@send');
Route::get('/time-coach', function(){
    return view('time_coach.privacy_policy');
});
Route::get('/energy-consumption', function(){
    return view('energy_consumption.simulator');
});