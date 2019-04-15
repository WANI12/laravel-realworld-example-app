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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/articles','articleController@articles');
Route::get('/category','categoriesController@category');
Route::post('/addCategory','categoriesController@addCategory');
Route::post('/addArticle','articleController@addArticle');
Route::get('/view/{article_id}','articleController@viewArticle');
Route::get('/edit/{article_id}','articleController@editArticle');
Route::post('/editarticle/{article_id}','articleController@editArticlePart');
Route::post('/delete/{article_id}','articleController@deleteArticle');