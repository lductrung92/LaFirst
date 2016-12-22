<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function() {
    Route::group(['prefix' => 'theloai'], function() {
        Route::get('danhsach', 'TheLoaiController@getDanhSach');
       
        Route::get('them', 'TheLoaiController@getThem');
        Route::post('them', 'TheLoaiController@postThem');

        Route::get('sua/{id}', 'TheLoaiController@getSua');
        Route::post('sua/{id}', 'TheLoaiController@postSua');

        Route::get('xoa/{id}', 'TheLoaiController@getXoa');
    });
    Route::group(['prefix' => 'loaitin'], function() {
        Route::get('danhsach', 'LoaiTinController@getLoaiTin');
        Route::get('sua', 'LoaiTinController@getLoaiTin');
        Route::get('them', 'LoaiTinController@getLoaiTin');
    });
    Route::group(['prefix' => 'tintuc'], function() {
        Route::get('danhsach', 'TinTucController@getTinTuc');
        Route::get('sua', 'TinTucController@getTinTuc');
        Route::get('them', 'TinTucController@geTinTuc');
    });   
});