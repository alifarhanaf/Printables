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

// Route::get('/', function () {
//     return view('admin/test');
// });
// Route::group(['namespace'=>'admin'],function (){
Route::get('/productadd', 'ProductController@index')->name('product.form');
Route::post('/productSubmit','ProductController@submitProduct')->name('submit.product');
Route::get('/productedit/{id}', 'ProductController@editproduct')->name('product.edit');
Route::get('/productgrid', 'ProductController@productgrid')->name('product.grid');
Route::post('/editproductsubmit/{id}','ProductController@editProductSubmit')->name('submit.edit.product');
Route::delete('/deleteproduct/{id}','ProductController@destroy')->name('product.delete');

Route::get('/brandadd', 'BrandController@index')->name('brand.form');
Route::post('/brandSubmit','BrandController@submitBrand')->name('submit.brand');
Route::get('/brandedit/{id}', 'BrandController@editbrand')->name('brand.edit');
Route::get('/brandgrid', 'BrandController@brandgrid')->name('brand.grid');
Route::post('/editbrandsubmit/{id}','BrandController@editBrandSubmit')->name('submit.edit.brand');
Route::delete('/deletebrand/{id}','BrandController@destroy')->name('brand.delete');

Route::get('/groupadd', 'GroupController@index')->name('group.form');
Route::post('/groupSubmit','GroupController@submitGroup')->name('submit.group');
Route::post('/groupFAQSubmit','GroupController@submitGroupFAQ')->name('submit.group.faq');
Route::get('/groupedit/{id}', 'GroupController@editgroup')->name('group.edit');
Route::post('/groupeditsubmit/{id}', 'GroupController@editgroupSubmit')->name('group.edit.submit');
Route::get('/groupgrid', 'GroupController@groupgrid')->name('group.grid');
Route::delete('/deletegroup/{id}','GroupController@destroy')->name('group.delete');
Route::delete('/groupfaqs','GroupController@faqsindex')->name('group.faqs');
Route::delete('/deletegroupfaq/{id}','GroupController@faqsdestroy')->name('group.faq.delete');

Route::get('/designadd', 'DesignController@index')->name('design.form');
Route::post('/designSubmit','DesignController@submitDesign')->name('submit.design');
Route::get('/designedit/{id}', 'DesignController@editdesign')->name('design.edit');
Route::get('/designgrid', 'DesignController@designgrid')->name('design.grid');
Route::delete('/deletedesign/{id}','DesignController@destroy')->name('design.delete');


Route::get('/categoryadd', 'CategoryController@index')->name('category.form');
Route::post('/categorySubmit','CategoryController@submitCategory')->name('submit.category');
Route::get('/categoryedit/{id}', 'CategoryController@editcategory')->name('category.edit');
Route::get('/categorygrid', 'CategoryController@categorygrid')->name('category.grid');
Route::delete('/deletecategory/{id}','CategoryController@destroy')->name('category.delete');


Route::get('/faqadd', 'FaqController@index')->name('faq.form');
Route::get('/faqsubmit', 'FaqController@submitfaq')->name('submit.faq');

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// });



Auth::routes();



Route::get('/', 'DashboardController@indexa');