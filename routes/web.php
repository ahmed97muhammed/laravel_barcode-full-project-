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

Route::get('/', function () {
    return redirect('login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Pages Routes

Route::get("viewproducts","ProductController@viewproducts");

Route::get("addproduct","ProductController@addproduct");

Route::get("createinvoice","InvoiceController@createinvoice");

Route::get("viewinvoices","InvoiceController@viewinvoices");

Route::get("viewinvoice/{id}","InvoiceController@viewinvoice");
//Ajax Routes

Route::post("addproduct_form_ajax_url","ProductController@addproduct_form_ajax_url");

Route::post("get_editproduct_form_ajax_url","ProductController@get_editproduct_form_ajax_url");

Route::post("edit_product_form_ajax_url","ProductController@edit_product_form_ajax_url");

Route::post("create_invoice_form_ajax_url","InvoiceController@create_invoice_form_ajax_url");

