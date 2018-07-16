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

Route::get('/', 'HomepageController@index')->name('home');
Route::get('/origines', 'PresentationController@origines')->name('origines');
Route::get('/qui-sommes-nous', 'PresentationController@qui')->name('presentation');
Route::get('/potentiel-d-adaptation', 'PresentationController@potentiel')->name('potentiel');
Route::get('/interpretation-et-limites', 'PresentationController@interpretation')->name('interpretation');
Route::get('/formule', 'PresentationController@formule')->name('formule');
Route::get('/productions-scientifiques', 'ProductionsController@index')->name('productions');

Route::get('/calcul', 'CalculController@index')->name('calcul');
Route::post('/calcul', 'CalculController@calcul_APS')->name('calcul');



Auth::routes();

