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

Route::get('/', 'Controller@home');
Route::get('/home', 'Controller@home')->name('home');

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login')->name('login.post');
Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register')->name('register.post');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/admin', 'Controller@admin')->name('admin')->middleware('auth');;

/* ALL ROUTES FOR INVOICES */
Route::get('/invoices', 'InvoicesController@index')->name('invoices')->middleware('auth');
Route::post('/search', 'InvoicesController@search')->name('invoices.search')->middleware('auth');
Route::post('/filterinvoicesbyyear', 'InvoicesController@search_year')->name('invoices.search_year')->middleware('auth');
Route::get('/invoices/incoming', 'InvoicesController@incoming')->name('invoices.incoming')->middleware('auth');
Route::get('/invoices/outgoing', 'InvoicesController@outgoing')->name('invoices.outgoing')->middleware('auth');
Route::get('/invoices/{id}/details', 'InvoicesController@details')->name('invoices.details')->middleware('auth');

Route::get('/invoices/create', 'InvoicesController@create')->name('invoices.create')->middleware('auth');
Route::post('/invoices/store', 'InvoicesController@store')->name('invoices.store')->middleware('auth');

Route::get('/invoices/{id}/edit', 'InvoicesController@edit')->name('invoices.edit')->middleware('auth');
Route::post('/invoices/{id}/update', 'InvoicesController@update')->name('invoices.update')->middleware('auth');


Route::get('/invoices/{id}/pay', 'InvoicesController@paid')->name('invoices.pay')->middleware('auth');

/* ALL ROUTES FOR CONTACTS */
Route::get('/contacts', 'ContactsController@index')->name('contacten.contacts')->middleware('auth');
Route::get('/contacts/create', 'ContactsController@create')->name('contacts.create')->middleware('auth');
Route::post('/contacts/create', 'ContactsController@store')->name('contacts.store')->middleware('auth');
Route::get('/contacts/{id}/edit', 'ContactsController@edit')->name('contacten.edit')->middleware('auth');
Route::post('/contacts/{id}/update', 'ContactsController@update')->name('contacts.update')->middleware('auth');
Route::get('/contacts/{id}/delete', 'ContactsController@delete')->name('contacts.delete')->middleware('auth');
Route::get('/contacts/{id}', 'ContactsController@show')->name('contacten.show');


Route::get('/results', 'ResultsController@index')->name('results')->middleware('auth');
Route::get('/results/global', 'ResultsController@resultGlobal')->name('results.global')->middleware('auth');
Route::get('/results/client', 'ResultsController@resultPerClient')->name('results.client')->middleware('auth');
Route::get('/results/vat', 'ResultsController@vat')->name('results.vat')->middleware('auth');
