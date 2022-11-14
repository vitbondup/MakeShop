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

Route::get('/', 'App\Http\Controllers\IndexController')->name('index');

Route::get('/catalog/index', 'App\Http\Controllers\CatalogController@index')->name('catalog.index');
Route::get('/catalog/category/{slug}', 'App\Http\Controllers\CatalogController@category')->name('catalog.category');
Route::get('/catalog/brand/{slug}', 'App\Http\Controllers\CatalogController@brand')->name('catalog.brand');
Route::get('/catalog/product/{slug}', 'App\Http\Controllers\CatalogController@product')->name('catalog.product');
