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
//トップ表示orユーザの投稿一覧表示
Route::get('/', 'MicropostsController@index1')->name('welcome');
//概要の表示
Route::get('overview', 'MicropostsController@index2')->name('overview');
//ユーザ登録機能【ゲスト枠】
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');
//ログイン・ログアウト
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

//ユーザの一覧表示・詳細・削除【会員枠】
Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show', 'destroy']]);
//ユーザのお気に入りの一覧表示
    Route::group(['prefix' => 'users/{id}'], function(){
        Route::get('favorites', 'UsersController@favorites')->name('users.favorites');
    });
    //お気に入り機能
    Route::group(['prefix' => 'microposts/{id}'], function(){
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
    });
    //投稿の作成・保存・削除
    Route::resource('microposts', 'MicropostsController', ['only' => ['create','store', 'destroy']]);
});


