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

Route::get('/','welcomecontroller@index');
Route::get('/category','welcomecontroller@category');
Route::get('/product-details','welcomecontroller@singleproduct');

Auth::routes();

Route::get('/dashboard','HomeController@index');


//category
Route::get('/category/add','categoryController@createcategory');
Route::post('/category/save','categoryController@categorystore');
Route::get('/category/manage','categoryController@categorymanage');
Route::get('/category/edit/{id}','categoryController@categoryedit');
Route::post('/category/update','categoryController@categoryupdate');
Route::get('/category/delete/{id}','categoryController@categorydelete');



//manufacture
Route::get('/manufacture/add','manufactureController@createmanufacture');
Route::post('/manufacture/save','manufactureController@manufacturestore');
Route::get('/manufacture/manage','manufactureController@manufacturemanage');
Route::get('/manufacture/edit/{id}','manufactureController@manufactureedit');
Route::post('/manufacture/update','manufactureController@manufactureupdate');
Route::get('/manufacture/delete/{id}','manufactureController@manufacturedelete');



//subcategory
Route::get('/subcategory/add','subcategoryController@createsubcategory');
Route::post('/subcategory/save','subcategoryController@subcategorystore');
Route::get('/subcategory/manage','subcategoryController@subcategorymanage');
Route::get('/subcategory/edit/{id}','subcategoryController@subcategoryedit');
Route::post('/subcategory/update','subcategoryController@subcategoryupdate');
Route::get('/subcategory/delete/{id}','subcategoryController@subcategorydelete');






//product
Route::get('/product/add','productController@createproduct');
Route::post('/product/save','productController@productstore');
Route::get('/product/manage','productController@productmanage');
Route::get('/product/edit/{id}','productController@productedit');
Route::post('/product/update','productController@productupdate');
Route::get('/product/delete/{id}','productController@productdelete');
Route::post('/product/search','productController@productsearch');
Route::post('/product/subcategorysearch','productController@productsubcategorysearch');
Route::post('/product/manufacturebycategory','productController@productmanufacturebycategory');
Route::post('/product/subcategorybycategory','productController@productsubcategorybycategory');





//cart

Route::post('/cart-add','cartController@addTocart');
Route::get('/cart-show','cartController@cartshow');
Route::post('/cart-update','cartController@cartupdate');
Route::get('/cart-delete/{id}','cartController@cartdelete');
Route::get('/cart-empty','cartController@cartempty');


//checkout

Route::get('/checkout','checkoutController@index');