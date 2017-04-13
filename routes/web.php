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

Route::get('/home', 'HomeController@index');


//this is where is redirect after successful login (transaction view)
Route::get('/transaction', 'HomeController@add_transaction')->name('transactionRoute');

//this is processing the post from form from transaction view
//Route::post('/transaction', 'HomeController@post_transaction');

//ajax call to populate subcategory drop down, url of ajax in transaction.js
Route::get('/ajax/subcategory-dropdown', 'AjaxController@subcategoryDropDownData');

//ajax call to submit/add transaction
Route::post('/ajax/submit','AjaxController@submitTransaction');

//list of all transactions - NOT USED
Route::get('/overview', 'HomeController@overview')->name('overviewRoute');

//list of all transaction details/subtransactions
Route::get('/subtransactions','HomeController@subtransactions')->name('subtransactionsRoute');

//edit categories
Route::get('/admin/categories','AdminController@edit_categories')->name('adminCategoriesRoute');
Route::post('/admin/categories','AdminController@post_categories')->name('postCategoriesRoute');
Route::put('/admin/categories/{id}','AdminController@put_categories')->name('putCategoriesRoute');
Route::delete('/admin/categories/{id}','AdminController@delete_categories')->name('deleteCategoriesRoute');

Route::get('/phpinfo',function(){ echo(phpinfo()); });