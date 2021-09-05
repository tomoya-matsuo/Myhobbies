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

Route::get('/', 'HobbiesController@index');

Route::get('about',function() {
    return view('about');
});
// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login','Auth\LoginController@showLoginForm')->name('login');
Route::post('login','Auth\LoginController@login')->name('login.post');
Route::get('logout','Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'users/{id}'],function() {
        Route::post('follow','UserFollowController@store')->name('user.follow');
        Route::delete('unfollow','UserFollowController@destroy')->name('user.unfollow');
        Route::get('followings','UsersController@followings')->name('users.followings');
        Route::get('followers','UsersController@followers')->name('users.followers');
        Route::get('favorites','UsersController@favorites')->name('users.favorites');
    });
    
        Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
        
        Route::group(['prefix' => 'hobbies/{id}'], function () {
        Route::post('favorite', 'FavoritesController@store')->name('favorites.favorite');
        Route::delete('unfavorite', 'FavoritesController@destroy')->name('favorites.unfavorite');
        
    });
    
        Route::post('/post','HobbiesController@store')->name('hobbies.store');
        Route::get('/post/create','HobbiesController@create')->name('hobbies.create');
        Route::get('/post/{hobby}','HobbiesController@show')->name('hobbies.show');
        Route::get('/post/{hobby}/edit','HobbiesController@edit')->name('hobbies.edit');
        Route::put('/post/{hobby}','HobbiesController@update')->name('hobbies.update');
        Route::delete('/post/{hobby}','HobbiesController@destroy')->name('hobbies.destroy');
        
        //ユーザ編集画面
        Route::get('/users/{user}/edit', 'UsersController@edit')->name('users.edit');
        //ユーザ更新画面
        Route::put('/users/update', 'UsersController@update')->name('users.update');       
});