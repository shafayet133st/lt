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

Route::get('/','pagescontroller@index')->name('home');
Route::get('/search','pagescontroller@search')->name('search');
Route::get('/products','pagescontroller@products')->name('product');
Route::get('/product/{slug}','pagescontroller@show')->name('product.show');
//Category start
Route::get('/fcat/index','Cat@index')->name('fcat.index');
Route::get('/fcat/{id}','Cat@show')->name('fcat.show');
//Category end
Route::get('/Contact', 'pagescontroller@Contact')->name('contact');

Route::group(['prefix' =>'admin'],function()
{
	Route::get('/','Adminpagecontroller@index')->name('admin.index');
	Route::get('/soft','Adminpagecontroller@soft')->name('admin.soft');
	Route::get('/product','Adminpagecontroller@product')->name('admin.product');
	Route::get('/page/edit/{id}','Adminpagecontroller@edit')->name('admin.page.edit');
	Route::get('/create','Adminpagecontroller@create')->name('admin.create');
	Route::post('/','Adminpagecontroller@pstore')->name('admin.pstore');
	Route::post('/page/edit/{id}','Adminpagecontroller@pupdate')->name('admin.pupdate');
	Route::post('/delete/{id}','Adminpagecontroller@pdelete')->name('admin.pdelete');

Route::group(['prefix' =>'cat'],function()
{


	//Category
	Route::get('/','CategoryController@index')->name('admin.cat.index');
	Route::get('/create','CategoryController@create')->name('admin.cat.create');
	Route::post('/','CategoryController@cstore')->name('admin.cstore');
	Route::get('/edit/{id}','CategoryController@edit')->name('admin.cat.edit');
	Route::post('/page/edit/{id}','CategoryController@cupdate')->name('admin.cupdate');
	Route::post('/delete/{id}','CategoryController@cdelete')->name('admin.cdelete');
    Route::get('/categoty/{id}', 'pagescontroller@categoty')->name('category');  
	

});	

Route::group(['prefix' =>'Brand'],function()
{


	//Category
	Route::get('/','BrandController@index')->name('admin.Brand.index');
	Route::get('/create','BrandController@create')->name('admin.Brand.create');
	Route::post('/','BrandController@bstore')->name('admin.bstore');
	Route::get('/edit/{id}','BrandController@edit')->name('admin.Brand.edit');
	Route::post('/page/edit/{id}','BrandController@update')->name('admin.update');
	Route::post('/delete/{id}','BrandController@delete')->name('admin.delete');
      
	

});	
//user routes
Route::group(['prefix' =>'user'],function()
{
Route::get('/pro','UserController@pro')->name('user.pro');
Route::get('/edit','UserController@upload')->name('user.edit');
Route::get('/token/{token}','VerificationController@index')->name('user.verification');
	});	

Route::group(['prefix' =>'Divition'],function()
{


	//Category
	Route::get('/','DivitionController@index')->name('admin.Divition.index');
	Route::get('/create','DivitionController@create')->name('admin.Divition.create');
	Route::post('/','DivitionController@distore')->name('admin.distore');
	Route::get('/edit/{id}','DivitionController@edit')->name('admin.Divition.edit');
	Route::post('/page/edit/{id}','DivitionController@update')->name('admin.update');
	Route::post('/delete/{id}','DivitionController@delete')->name('admin.delete');
      
	

});      
Route::group(['prefix' =>'District'],function()
{


	//Category
	Route::get('/','DistrictController@index')->name('admin.District.index');
	Route::get('/create','DistrictController@create')->name('admin.District.create');
	Route::post('/','DistrictController@dstore')->name('admin.dstore');
	Route::get('/edit/{id}','DistrictController@edit')->name('admin.District.edit');
	Route::post('/page/edit/{id}','DistrictController@update')->name('admin.update');
	Route::post('/delete/{id}','DistrictController@delete')->name('admin.delete');
      
	

});  	

});
//category

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
