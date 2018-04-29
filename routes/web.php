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

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard.index');
// });

// Route::resource('/products', 'CustomerController');
// ('/', 'HomeController@index');
//

Route::prefix('admin')->group(function () {
  Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
  Route::resource('/categories', 'CategoriesController');
  Route::resource('/subcategories', 'SubcategoriesController');
  Route::get('/subcategories/attributes/{subcategory_id}{product_id}', 'ProductsController@attribute')->name('products.attribute');
  Route::post('/subcategories/attributes/{product_id}', 'ProductsController@store_attribute')->name('products.store_attribute');
  //Route::get('/subcategories', 'SubcategoriesController@attribute')->name('subcategory.attribute');
  Route::resource('/products', 'ProductsController');
  Route::get('/','AdminController@index');

});
