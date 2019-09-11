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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/pageA', 'PageAController@pageA')->name('pageA');
Route::get('/pageA/{slug}', 'PageAController@pageA_slug')->name('pageASlug');
Route::get('/pageA/generateNewOne/{id}', 'PageAController@generateNewOne')->name('generateNewUrl');
Route::get('/pageA/deactivateUrl/{id}', 'PageAController@deactivateUrl')->name('deactivateUrl');
Route::get('/pageA/feelLucky/{id}', 'PageAController@feelLucky')->name('feelLucky');
Route::get('/history/{id}', 'PageAController@history')->name('history');


Route::group(['prefix' => 'admin'] , function(){
    Route::group( ['middleware' => 'admin' ], function() {
        Route::get('/', 'Admin\DashboardController@index')->name('admin');
        Route::get('/create', 'Admin\DashboardController@create')->name('admin.getCreate');
        Route::post('/create', 'Admin\DashboardController@store')->name('admin.postCreate');
        Route::get('/update/{id}', 'Admin\DashboardController@edit')->name('admin.getUpdate');
        Route::post('/update/', 'Admin\DashboardController@update')->name('admin.postUpdate');
        Route::get('/destroy/{id}', 'Admin\DashboardController@destroy')->name('admin.getDelete');
    });
});