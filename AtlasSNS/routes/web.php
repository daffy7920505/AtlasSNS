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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

// ...
// Route::get( '/login', 'Auth\Auth0IndexController@login' )->name( 'login' );
Route::get( '/logout', 'Auth\LoginController@logout' )->name( 'logout' );

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index');

//投稿機能の編集
Route::post('/post/update', 'PostsController@updateForm');

// Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');//ユーザー検索への移動
Route::post('/search','UsersController@search');//ユーザー検索への移動
// /searchのURLにアクセスがあったらUsersCOntrollerのsearchメソッドを実行

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');

Route::post('/post','PostsController@post');//つぶやき登録 /postとcontrollerを紐づける @~は関数
// Route::get('/',function(){
// return view('top');
// });
Route::get('index','PostsController@index');

Route::post('post/{id}/update-form', 'PostsController@update');//つぶやき登録の更新　
Route::get('post/{id}/update-form', 'PostsController@update');//つぶやき登録の更新
Route::post('/post/{id}/delete','PostsController@delete');//つぶやき登録の削除
Route::get('/post/{id}/delete','PostsController@delete');//つぶやき登録の削除
Route::get('/post','PostsController@search');

// Route::resource('user', 'UsersController', ['only' => ['index', 'show', 'edit', 'update']]);

    // ログイン状態
Route::group(['middleware' => 'auth'], function() {

// ユーザ関連
Route::resource('user', 'UsersController');

});

//フォローする/フォロー解除を追加
Route::get('follow-create/{user}', 'FollowsController@follow')->name('follow');
Route::get('follow-delete/{user}', 'FollowsController@unfollow')->name('unfollow');


// Route::resource('users', 'FollowsController');
// Route::resource('users', 'FollowsController', ['only' => ['index', 'show', 'edit', 'update']]);

// フォローリストページの移動
Route::get('/Follow','FollowsController@followlist');

// フォローリストのユーザーアイコン一覧表示する
Route::get('/follow','FollwsController@followlist')->name('image');

// フォロワーリストページの移動
Route::get('/Follower','FollowsController@followerlist');

// フォローボタンの更新
Route::get('/Following','FollowsController@followlist');

// フォロー解除の更新
//Route::get('/Follows','FollowsController@followlist');

Route::group(['middleware' => 'auth'], function(){

//プロフィール編集画面表示
Route::get('/profile', 'UsersController@show')->name('profile');
//プロフィール編集
Route::put('/profile', 'UsersController@profileUpdate')->name('profile_edit');
//パスワード編集
Route::put('/password_change', 'UsersController@passwordUpdate')->name('password_edit');
});
// Route::post('UserName', 'UsersController@');
