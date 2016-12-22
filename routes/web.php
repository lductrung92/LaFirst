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

Route::get('test', function(){
    $theloai = App\TheLoai::find(1);
    foreach($theloai->loaitin as $loaitin){
        echo $loaitin->Ten. '<br />';
    }
});
