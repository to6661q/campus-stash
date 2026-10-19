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

Route::get('/', 'MasterData@index')->name('default');
Route::get('/delete/{id}', 'MasterData@delete')->name('delete');
Route::get('/edit/{id?}', 'MasterData@index')->name('edit');
Route::post('/manage', 'MasterData@manage')->name('manage');
Route::get('/about', 'About@index')->name('about');