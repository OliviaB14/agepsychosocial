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
Route::get('/productions-scientifiques', 'ProductionsController@index')->name('productions');


Route::get('/aps/article/{id}', 'ProductionsController@show')->name("guest_article");


/*
 *
 * calcul pages
 *
 *
 */
Route::get('/calcul', 'CalculController@index')->name('calcul');
Route::post('/calcul', 'CalculController@calcul_APS')->name('calcul');

Route::get('article/{id}/image', function ($id) {
    // Find the article
    $article = AgePsychoSocial\Article::find($id);

    // Return the image in the response with the correct MIME type
    return response()->make($article->main_img, 200, array(
        'Content-Type' => (new finfo(FILEINFO_MIME))->buffer($article->main_img)
    ));
});





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
    Route::post('/user/{id}/update', 'DashboardController@update')->name('update_user');

    Route::post('/user/{id}/password', 'DashboardController@changePassword')->name('update_user_password');

    /*
     * articles
     */
    Route::get('/articles/all', 'ArticlesController@index')->name('show_articles');

    Route::get('/articles/new', 'ArticlesController@createNew')->name('create_article');
    Route::post('/articles/new', 'ArticlesController@create');

    Route::get('/article/{id}', 'ArticlesController@show')->name("show_article");
    Route::get('/article/{id}/edit', 'ArticlesController@show_edit')->name("edit_article");
    Route::put('/article/update/{id}', 'ArticlesController@update')->name('update_article');

    Route::delete('/article/{id}/delete', 'ArticlesController@delete')->name('delete_article');



    Route::get('/filemanager', '\UniSharp\LaravelFilemanager\controllers\LfmController@show');
    Route::post('/filemanager/upload', '\UniSharp\LaravelFilemanager\controllers\UploadController@upload');


});
