<?php

use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});
Route::get('/articles', "ArticleController@index");
Route::get('/articles/detail/{id}', "ArticleController@detail")->name('article.detail');
Route::get('/articles/more', function () {
    return redirect()->route('article.detail');
});
Route::get('/articles/add', 'ArticleController@add');
Route::post('/articles/add', 'ArticleController@create');
Route::get('/articles/delete/{id}', 'ArticleController@delete');
Route::post('/comments/add', 'CommentController@create');
Route::get('/commends/delete/{id}', 'CommentController@delete');

Route::get('/likes/add/{id}', 'LikeController@create');
Route::get('/likes/remove/{id}', 'LikeController@remove');

//Route::get('/test',[])
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// API
// Route::get('/categories', 'CategoryApiController@index');
// Route::get('/categories/{id}', 'CategoryApiController@detail');
// Route::post('/categories', 'CategoryApiController@create');
// Route::put('/categories/{id}', 'CategoryApiController@update');
// Route::patch('/categories/{id}', 'CategoryApiController@update');
// Route::delete('/categories/{id}', 'CategoryApiController@delete');
