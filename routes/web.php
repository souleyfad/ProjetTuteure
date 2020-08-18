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
Route::view('/','welcome');
Route::get('contact','ContactController@create')->name('contact.create');
Route::post('contact','ContactController@store')->name('contact.store');

/** document routes */
Route::get('/document','DocumentController@index')->middleware('auth:web,admin');
Route::get('/document/create','DocumentController@create')->middleware('auth:admin');
Route::post('/document','DocumentController@store');
Route::get('/document/{document}','DocumentController@show')->name('document.show');
Route::get('/document/{document}/edit','DocumentController@edit');
Route::patch('/document/{document}','DocumentController@update');
Route::delete('/document/{document}','DocumentController@destroy');
Route::get('/document/download/{doc}','DocumentController@download');
Route::get('/search','DocumentController@search');

/** domaine routes */
Route::get('/domaine','DomaineController@index')->middleware('auth:admin');
Route::get('/domaine/create','DomaineController@create')->middleware('auth:admin');
Route::get('/domaine/{domaine}','DomaineController@show');
Route::get('/domaine/{domaine}/edit','DomaineController@edit');
Route::patch('/domaine/{domaine}','DomaineController@update');
Route::delete('/domaine/{domaine}','DomaineController@destroy');
Route::post('/domaine','DomaineController@store');

/**sousdomaine routes */
Route::get('/sousdomaine','SousDomaineController@index')->middleware('auth:admin');
Route::get('/sousdomaine/create','SousDomaineController@create')->middleware('auth:admin');
Route::get('/sousdomaine/{sousdomaine}','SousDomaineController@show');
Route::get('/sousdomaine/{sousdomaine}/edit','SousDomaineController@edit');
Route::patch('/sousdomaine/{sousdomaine}','SousDomaineController@update');
Route::delete('/sousdomaine/{sousdomaine}','SousDomaineController@destroy');
Route::post('/sousdomaine','SousDomaineController@store');

/**commentaire routes */
Route::post('/commentaire/{document}', 'CommentaireController@store')->name('commentaire.store');

Auth::routes();

Route::get('/admin/login','Auth\Admin\LoginController@showLoginForm');
Route::post('/admin/login','Auth\Admin\LoginController@login')->name('adminLogin');

Route::get('/admin/register','Auth\Admin\RegisterController@showRegistrationForm');
Route::post('/admin/register','Auth\Admin\RegisterController@register')->name('adminRegister');

Route::get('/home', 'HomeController@index')->name('home');
