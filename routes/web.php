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

Auth::routes();

/* Маршруты Админ-панели */
Route::get('admin/users', 'Admin\UserController@index');
Route::get('admin/users/create', 'Admin\UserController@create');
Route::post('admin/users', 'Admin\UserController@store');
Route::get('admin/users/{id}', 'Admin\UserController@show');
Route::post('admin/users/{id}/update_info', 'Admin\UserController@update_info');
Route::post('admin/users/{id}/update_password', 'Admin\UserController@update_password');
Route::post('admin/users/{id}/update_photo', 'Admin\UserController@update_photo');
Route::get('admin/users/{id}/delete', 'Admin\UserController@delete');
Route::get('admin/users/{id}/restore', 'Admin\UserController@restore');