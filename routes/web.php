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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Users routes

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/user/{user}', 'UsersController@show');

Route::get('/user/profile/{useruniqid}', 'UsersController@profile')->name('profile');

Route::get('/user/setting/{useruniqid}', 'UsersController@setting')->name('setting');

// Customer routes

Route::resource('customers', 'CustomersController');


// Project routes

Route::resource('projects', 'ProjectsController');
Route::get('customerproject/{customer}', 'ProjectsController@customerproject')->name('customerproject');

// Task routes

Route::resource('tasks', 'TasksController');
Route::get('projecttask/{project}', 'TasksController@projecttask')->name('projecttask');