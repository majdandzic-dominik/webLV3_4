<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//prikaz stvaranja i spremanje
Route::get('/projects', 'App\Http\Controllers\ProjectController@index')->name('projects.index');
Route::get('/projects/create', 'App\Http\Controllers\ProjectController@create')->name('projects.create');
Route::post('/projects', 'App\Http\Controllers\ProjectController@store');

//dodavanje korisnika
Route::get('/projects/add_user/{id}', 'App\Http\Controllers\ProjectController@show_add_user')->name('projects.add_user');
Route::post('/projects/add_user/{id}', 'App\Http\Controllers\ProjectController@add_user');

//update i brisanje
Route::get('/projects/edit/{id}', 'App\Http\Controllers\ProjectController@edit')->name('projects.edit');
Route::get('/projects/{id}', 'App\Http\Controllers\ProjectController@show')->name('projects.show');
Route::delete('/projects/{id}', 'App\Http\Controllers\ProjectController@destroy');
Route::patch('/projects/{id}', 'App\Http\Controllers\ProjectController@update');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
