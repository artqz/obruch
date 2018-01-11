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
Route::get('admin', 'Admin\DashboardController@index');

/* --- Пользователи */
Route::get('admin/users', 'Admin\UserController@index');
Route::get('admin/users/create', 'Admin\UserController@create');
Route::post('admin/users', 'Admin\UserController@store');
Route::get('admin/users/{id}', 'Admin\UserController@show');
Route::post('admin/users/{id}/update_info', 'Admin\UserController@update_info');
Route::post('admin/users/{id}/update_password', 'Admin\UserController@update_password');
Route::post('admin/users/{id}/update_photo', 'Admin\UserController@update_photo');
Route::get('admin/users/{id}/delete', 'Admin\UserController@delete');
Route::get('admin/users/{id}/restore', 'Admin\UserController@restore');

/* --- Организации */
Route::get('admin/organizations', 'Admin\OrganizationController@index');
Route::get('admin/organizations/create', 'Admin\OrganizationController@create');
Route::post('admin/organizations', 'Admin\OrganizationController@store');
Route::get('admin/organizations/{id}', 'Admin\OrganizationController@show');
Route::post('admin/organizations/{id}/update_info', 'Admin\OrganizationController@update_info');
/* ------- Отделы */
Route::get('admin/organizations/{id}/departments', 'Admin\DepartmentController@index');
Route::get('admin/organizations/{id}/departments/create', 'Admin\DepartmentController@create');
Route::post('admin/organizations/{id}/departments', 'Admin\DepartmentController@store');

/* --- Элдок */
Route::get('admin/edoc', 'Admin\EdocController@index');
Route::get('admin/edoc/inbox', 'Admin\EdocController@inbox_index');
Route::get('admin/edoc/inbox/create', 'Admin\EdocController@inbox_create');
Route::post('admin/edoc/inbox', 'Admin\EdocController@inbox_store');
Route::get('admin/edoc/inbox/{id}', 'Admin\EdocController@inbox_show');
Route::get('admin/edoc/outbox', 'Admin\EdocController@outbox_index');

/* Маршруты Сайта */
Route::get('/', 'HomeController@index');