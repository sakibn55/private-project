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
Route::get('logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/create/post','productController@create');
Route::get('/create/cat', 'CategoriesController@create');
Route::get('/create/district', 'DistrictController@create');
Route::get('/create/divisions', 'DivisionsController@create');
Route::post('catstore', 'CategoriesController@store')->name('catstore');
Route::post('districtstore', 'DistrictController@store')->name('districtstore');
Route::post('divisionsstore', 'DivisionsController@store')->name('divisionsstore');
Route::get('divisions/show/{id}', 'DivisionsController@show')->name('divisions/show');
Route::get('district/show/{id}', 'DistrictController@show')->name('district/show');
Route::post('divisions_district_store', 'DivisionsController@divisionsDistrictStore')->name('divisions_district_store');
Route::get('/create/division/district','DivisionsController@createDivisionsDistrict')->name('divisions_district_create');
Route::post('thanastore', 'ThanaController@store')->name('thanastore');
Route::get('/create/thana', 'ThanaController@create');
Route::get('/create/district/thana','DistrictController@createDistrictThana')->name('district_thana_create');
Route::post('district_thana_store','DistrictController@DistrictThanaStore')->name('district_thana_store');
Route::get('districts/show/{id}', 'DistrictController@show')->name('districts/show');

Route::get('/findDivisionName','productController@findDivisionName');
Route::get('/findDistrictName','productController@findDistrictName');

Route::post('productStore','ProductsController@store')->name('productStore');
Route::get('/productshow' ,'ProductsController@show');



