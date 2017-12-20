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

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard.index');
});
// Route::get('/admin/categories', 'CategoriesController@index');
// Route::get('/admin/categories/create', 'CategoriesController@create');
// Route::post('/admin/categories/create', 'CategoriesController@store');

// Route::get('/admin/categories/create', function () {
//     return view('admin.categories.create');
// });

//
// Route::get('/', 'HomeController@index');
//
Route::resource('/admin/categories', 'CategoriesController');
Route::resource('/admin/subcategories', 'SubcategoriesController');
// Route::resource('/admin/subcategories', 'SubcategoriesController');
// Route::resource('products', 'ProductsController');
// // Route::get('/', function () {
//     return view('welcome');
// });
//
//Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
//
// Auth::routes();
//
// Route::get('/home', 'HomeController@index')->name('home');
