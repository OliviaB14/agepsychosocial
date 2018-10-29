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

/*
 *
 *
 *
 * main pages
 *
 *
 */
Route::get('/', 'HomepageController@index')->name('home');
Route::get('/origines', 'PresentationController@origines')->name('origines');
Route::get('/qui-sommes-nous', 'PresentationController@qui')->name('presentation');
Route::get('/potentiel-d-adaptation', 'PresentationController@potentiel')->name('potentiel');
Route::get('/interpretation-et-limites', 'PresentationController@interpretation')->name('interpretation');
Route::get('/formule', 'PresentationController@formule')->name('formule');
//Route::get('/productions-scientifiques', 'ProductionsController@index')->name('productions');

/*
 *
 * calcul pages
 *
 *
 */
Route::get('/calcul', 'CalculController@index')->name('calcul');
Route::post('/calcul', 'CalculController@calcul_APS')->name('calcul');



Auth::routes();

/*
 *
 *
 * Authenticated routes
 *
 *
 */

Route::group(['middleware' => ['auth']], function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');


    /*
     * user update
     */
    Route::post('/user/update/{id}', 'DashboardController@update');

    /*
     * articles
     */
    Route::get('/dashboard/articles', 'ArticlesController@index')->name('b_articles');

    Route::get('/dashboard/articles/create', 'ArticlesController@createNew')->name('b_articles');
    Route::post('/dashboard/articles/create', 'ArticlesController@create');

    Route::get('/dashboard/article/{id}', 'ArticlesController@show');
    Route::get('/dashboard/admin/article/{id}', 'ArticlesController@show_edit')->name("edit_article");

    Route::delete('/dashboard/article/delete/{id}', 'ArticlesController@delete')->name('delete_article');


});
