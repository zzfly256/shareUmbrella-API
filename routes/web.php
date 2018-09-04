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

Route::get('/admin/login', 'adminController@login');
Route::post('/admin/login', 'adminController@login_action');
Route::get('/admin/logout', 'adminController@logout_action');

Route::get('/admin/php','adminController@php');
Route::post('/admin/php','adminController@php');

Route::group(['middleware' => 'login'], function() {
    Route::get('/admin/user', 'adminController@user_index');
    Route::get('/admin/user/rank', 'adminController@user_rank');
    Route::get('/admin/user/block', 'adminController@user_block');
    Route::get('/admin/user/{id}/edit', 'adminController@user_edit');
    Route::put('/admin/user/{id}/edit', 'adminController@user_update');
    Route::get('/admin/user/{id}/delete', 'adminController@user_delete');
    Route::get('/admin/user/{id}/recovery', 'adminController@user_recovery');

    Route::get('/admin/area', 'adminController@area_index');
    Route::get('/admin/area/add', 'adminController@area_add');
    Route::post('/admin/area/add', 'adminController@area_create');
    Route::get('/admin/area/rank', 'adminController@area_rank');
    Route::get('/admin/area/{id}/edit', 'adminController@area_edit');
    Route::put('/admin/area/{id}/edit', 'adminController@area_update');
    Route::get('/admin/area/{id}/delete', 'adminController@area_delete');

    Route::get('/admin/item', 'adminController@item_index');
    Route::get('/admin/item/words', 'adminController@words_edit');
    Route::post('/admin/item/words', 'adminController@words_update');
    Route::get('/admin/item/{id}/edit', 'adminController@item_edit');
    Route::put('/admin/item/{id}/edit', 'adminController@item_update');
    Route::get('/admin/item/{id}/delete', 'adminController@item_delete');
});