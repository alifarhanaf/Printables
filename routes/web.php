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
Route::middleware(['admin'])->group(function () {
//Products CRUD
Route::get('/productadd', 'ProductController@index')->name('product.form')->middleware('admin');
Route::post('/productSubmit','ProductController@submitProduct')->name('submit.product');
Route::get('/productgrid', 'ProductController@productgrid')->name('product.grid');
Route::get('/productedit/{id}', 'ProductController@editproduct')->name('product.edit');
Route::post('/editproductsubmit/{id}','ProductController@editProductSubmit')->name('submit.edit.product');
Route::delete('/deleteproduct/{id}','ProductController@destroy')->name('product.delete');
Route::delete('/deleteproductimage/{id}','ProductController@destroyimage')->name('product.image.delete');
//Group CRUD
Route::get('/groupadd', 'GroupController@index')->name('group.form');
Route::post('/groupSubmit','GroupController@submitGroup')->name('submit.group');
Route::post('/groupFAQSubmit','GroupController@submitGroupFAQ')->name('submit.group.faq');
Route::get('/groupedit/{id}', 'GroupController@editgroup')->name('group.edit');
Route::post('/groupeditsubmit/{id}', 'GroupController@editgroupSubmit')->name('group.edit.submit');
Route::get('/groupgrid', 'GroupController@groupgrid')->name('group.grid');
Route::delete('/deletegroup/{id}','GroupController@destroy')->name('group.delete');
Route::delete('/groupimagedelete/{id}','GroupController@groupImageDelete')->name('group.image.delete');
Route::delete('/deletegroupfaq/{id}','GroupController@faqsdestroy')->name('group.faq.delete');

Route::get('/printTypeForm', 'PrintTypeController@index')->name('printType.form');
Route::post('/printTypeSubmit','PrintTypeController@submitPrintType')->name('submit.printType');


Route::get('/printLocationForm', 'PrintTypeController@plindex')->name('printLocation.form');
Route::post('/printLocationSubmit','PrintTypeController@submitPrintLocation')->name('submit.printLocation');
//Brands CRUD
Route::get('/brandadd', 'BrandController@index')->name('brand.form');
Route::post('/brandSubmit','BrandController@submitBrand')->name('submit.brand');
Route::get('/brandedit/{id}', 'BrandController@editbrand')->name('brand.edit');
Route::get('/brandgrid', 'BrandController@brandgrid')->name('brand.grid');
Route::post('/editbrandsubmit/{id}','BrandController@editBrandSubmit')->name('submit.edited.brand');
Route::delete('/deletebrand/{id}','BrandController@destroy')->name('brand.delete');



Route::get('/designadd', 'DesignController@index')->name('design.form');
Route::post('/designSubmit','DesignController@submitDesign')->name('submit.design');
Route::get('/designedit/{id}', 'DesignController@editDesign')->name('design.edit');
Route::get('/designgrid', 'DesignController@designgrid')->name('design.grid');
Route::post('/submitEditedDesign/{id}','DesignController@submitEditedDesign')->name('submit.edited.design');
Route::delete('/deletedesign/{id}','DesignController@destroy')->name('design.delete');


Route::get('/categoryadd', 'CategoryController@index')->name('category.form');
Route::post('/categorySubmit','CategoryController@submitCategory')->name('submit.category');
Route::get('/categoryedit/{id}', 'CategoryController@editCategory')->name('category.edit');
Route::post('/submitEditedCategory/{id}','CategoryController@submitEditedCategory')->name('submit.edited.category');
Route::get('/categorygrid', 'CategoryController@categorygrid')->name('category.grid');
Route::delete('/deletecategory/{id}','CategoryController@destroy')->name('category.delete');


Route::get('/faqadd', 'FaqController@index')->name('faq.form');
Route::post('/faqsubmit', 'FaqController@submitfaq')->name('submit.faqs');
Route::post('/editfaqsubmit/{id}', 'FaqController@submiteditfaq')->name('submit.edit.faqs');
Route::get('/faqedit/{id}', 'FaqController@editfaq')->name('faq.edit');
Route::get('/faqgrid', 'FaqController@faqgrid')->name('faq.grid');
Route::delete('/deletefaq/{id}', 'FaqController@destroy')->name('faq.delete');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::get('/totalCampaigns', 'CampaignController@allCampaignsAdmin')->name('allCampaignsAdmin');

Route::get('/setForApprovalCampaigns', 'CampaignController@setForApprovalCampaigns')->name('setForApprovalCampaigns');

});
Route::get('/campaign/{id}', 'CampaignController@campaignScreenAdmin')->name('campaignScreenAdmin');
Route::get('/messages/{id}', 'CampaignController@getMessages')->name('getMessages');

Auth::routes();



Route::get('/', 'HomeController@home')->name('homeScreen');
Route::get('/designs', 'HomeController@collections')->name('designScreen');
Route::get('/products', 'HomeController@products')->name('productScreen');
Route::get('/designDetails', 'HomeController@designDetailScreen')->name('designDetailScreen');
Route::get('/printTypes', 'HomeController@printTypeScreen')->name('printTypeScreen');
Route::get('/deliveryAddress', 'HomeController@deliveryAddressScreen')->name('deliveryAddressScreen');
Route::get('/aboutUs', 'HomeController@aboutUsScreen')->name('aboutUsScreen');
Route::get('/cart', 'HomeController@cartScreen')->name('cartScreen');
Route::get('/designByID/{id}', 'DesignController@designByID')->name('design.single');
Route::post('/setCookie','CookieController@setCookie')->name('setCookie');
Route::post('/setProductCookie','CookieController@setProductCookie')->name('setProductCookie');
Route::post('/setPrintTypeCookie','CookieController@setPrintTypeCookie')->name('setPrintTypeCookie');

Route::post('/setDesignDetailCookie','CookieController@setDesignDetailCookie')->name('setDesignDetailCookie');
Route::get('/allPrintLocations', 'PrintTypeController@allPrintLocations')->name('allPrintLocations');
Route::get('/allPrintTypeFaqs/{id}', 'PrintTypeController@allPrintTypeFaqs')->name('allPrintTypeFaqs');
Route::get('/faqAnswers/{id}', 'PrintTypeController@faqAnswers')->name('faqAnswers');

Route::post('/setDraftCampaign','CampaignController@setDraftCampaign')->name('setDraftCampaign')->middleware('user');


Route::get('/productsByBrandID/{id}', 'CookieController@productsByBrandID')->name('productsByBrandID');

Route::get('/productsByCategoryID/{id}', 'CookieController@productsByCategoryID')->name('productsByCategoryID');
Route::get('/productsByBrandAndCategoryID/{bid}/{cid}', 'CookieController@productsByBrandAndCategoryID')->name('productsByBrandAndCategoryID');
Route::get('/productsSearchWithBrandAndCategoryID/{bid}/{cid}/{search}', 'CookieController@productsSearchWithBrandAndCategoryID')->name('productsSearchWithBrandAndCategoryID');
Route::get('/testProducts', 'CookieController@testProducts');


Route::get('/userCampaigns', 'CampaignController@userCampaigns');

Route::post('message', 'CampaignController@sendMessage');

Route::middleware(['user'])->group(function () {

});

Route::get('/campaigns/{id}', 'CampaignController@campaignScreen')->name('campaignScreen');
Route::get('/allCampaigns', 'CampaignController@allCampaigns')->name('allCampaigns');

Route::get('/testEmail', 'CampaignController@testEmail');
// Route::view('/userRegister', 'web.emails.userRegisterMail');