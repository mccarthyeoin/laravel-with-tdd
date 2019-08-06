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
    return redirect('/projects');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/projects', 'ProjectsController@index')->middleware('auth');
    Route::get('/projects/create', 'ProjectsController@create')->middleware('auth');
    Route::get('/projects/{project}', 'ProjectsController@show')->middleware('auth');
    Route::patch('/projects/{project}', 'ProjectsController@update')->middleware('auth');
    Route::post('/projects', 'ProjectsController@store')->middleware('auth');

    Route::post('/projects/{project}/tasks', 'ProjectTasksController@store')->middleware('auth');
    Route::patch('/projects/{project}/tasks/{task}', 'ProjectTasksController@update')->middleware('auth');
});

Auth::routes();
