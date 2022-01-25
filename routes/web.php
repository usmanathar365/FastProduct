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
    return redirect('login');
});

Auth::routes();


Route::get('/admin', 'AdminController@index')->name('admin.home')->middleware('admin');
Route::get('/user', 'UserController@index')->name('user.home')->middleware('user');
Route::get('/vendor-home', 'VendorController@index')->name('vendor.home')->middleware('vendor');

///////////////  Vendor /////////////////////////

// Route::group(['prefix'=>'Vendor'  ], function() {

    ////////////////// Categories Routes   //////////////////////////////
    Route::get('Vendor-Categories', 'CategoryController@Categories')->name('categories')->middleware('vendor');
    Route::get('Vendor-AddCategory', 'CategoryController@AddCategory')->name('add.category')->middleware('vendor');
    Route::post('Vendor-SaveCategory', 'CategoryController@SaveCategory')->name('save.category')->middleware('vendor');
    Route::post('Edit-Category', 'CategoryController@EditCategory')->name('edit.category')->middleware('vendor');
    Route::post('Vendor-UpdateCategory', 'CategoryController@UpdateCategory')->name('update.category')->middleware('vendor');
    Route::get('Vendor-DeleteCategory', 'CategoryController@DeleteCategory')->name('delete.category')->middleware('vendor');
    
    //////////////////////  Products Routes ////////////////////////////////
    Route::get('Vendor-Products', 'ProductController@Products')->name('products')->middleware('vendor');
    Route::get('Vendor-AddProduct', 'ProductController@AddProduct')->name('add.product')->middleware('vendor');
    Route::post('Vendor-SaveProduct', 'ProductController@SaveProduct')->name('save.product')->middleware('vendor');
    Route::post('Edit-Product', 'ProductController@EditProduct')->name('edit.product')->middleware('vendor');
    Route::post('Vendor-UpdateProduct', 'ProductController@UpdateProduct')->name('update.product')->middleware('vendor');
    Route::get('Vendor-DeleteProduct', 'ProductController@DeleteProduct')->name('delete.product')->middleware('vendor');
    

    ////////////////  Brand  ////////////////////////////////////////////////
    Route::get('Vendor-Brands', 'BrandController@Brand')->name('brand')->middleware('vendor');
    Route::get('Vendor-AddBrands', 'BrandController@AddBrand')->name('add.brand')->middleware('vendor');
    Route::post('Vendor-SaveBrand', 'BrandController@SaveBrand')->name('save.brand')->middleware('vendor');
    Route::post('Vendor-UpdateBrand', 'BrandController@UpdateBrand')->name('update.brand')->middleware('vendor');


    // });
   
   ////////////// End Vendor //////////////////////    