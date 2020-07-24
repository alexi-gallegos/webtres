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

Route::redirect('/', '/users');
Route::get('users', 'UserController@index')->name('users_inicio');
Route::get('users/create', 'UserController@create')->name('users_create');
Route::get('users/edit/{id}', 'UserController@edit')->name('users_edit');
Route::patch('users', 'UserController@update')->name('users_update');

