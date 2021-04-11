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

Route::get('/', 'HomeController@index');
Route::get('/trang-chu', 'HomeController@index');

// danh muc san pham - trang chu
Route::get('/danhmucsanpham/{cate_id}', 'CategoryProduct@show_category');
Route::get('/tinhtrangsanpham/{status_id}', 'CategoryProduct@show_status');