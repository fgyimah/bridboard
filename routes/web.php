<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth'], function () {
    // project routes
    Route::get('/projects', 'App\Http\Controllers\ProjectsController@index');
    Route::get('/projects/create', 'App\Http\Controllers\ProjectsController@create');
    Route::get('/projects/{project}', 'App\Http\Controllers\ProjectsController@show');
    Route::patch('/projects/{project}', 'App\Http\Controllers\ProjectsController@update');
    Route::post('/projects', 'App\Http\Controllers\ProjectsController@store');

    // project tasks routes
    Route::post('/projects/{project}/tasks', 'App\Http\Controllers\ProjectTasksController@store');
    Route::patch('/projects/{project}/tasks/{task}', 'App\Http\Controllers\ProjectTasksController@update');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

Auth::routes();
