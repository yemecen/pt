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
Route::get('/','CmController@index');

Route::resource('cms','CmController');

Route::any('/cms/search','CmController@search')->name('cms.search');
Route::any('/cms/selectSearch','CmController@selectSearch')->name('cms.selectSearch');
Route::get('/cm/close','CmController@close')->name('cms.close');
Route::get('/cm/open','CmController@open')->name('cms.open');

Route::resource('cmDetail','CmDetailController');

Route::resource('systems','SystemController');

Route::resource('subsystems','SubSystemController');

Route::resource('types','TypeController');

Route::resource('levels','LevelController');

Route::resource('stats','StatController');

Route::resource('precedences','PrecedenceController');

Auth::routes();