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
// );

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contactus', 'HomeController@contactus')->name('contactus');

Route::get('posts','PostController@index')->name('post.index');
Route::get('post/{slug}','PostController@details')->name('post.details');
Route::get('/category/{slug}','PostController@postByCategory')->name('category.posts');
Route::get('/committee','committeecontroller@index');
Route::get('/committee/{type}','committeecontroller@show');

Route::resource('reunion','reunioncontroller');


Auth::routes();
Auth::routes(['verify' => true]);

Route::group(['middleware'=>['pending']],function(){

    Route::resource('/pending', 'pendingcontroller');
    
    
});

Route::group(['middleware'=>['auth']], function (){
    Route::post('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
 });



Route::group(['as'=>'admin.','prefix'=>'admin','namespace'=>'admin','middleware'=>['auth','admin']],function(){

        Route::get('settings','sattingscontroller@index')->name('settings');
        Route::put('profile-update','sattingscontroller@updateProfile')->name('profile.update');
        Route::put('password-update','sattingscontroller@updatePassword')->name('password.update');
        

        Route::get('dashboard','Deshboardcontroller@index')->name('dasboard');
        Route::resource('tag','tagcontroller');
        route::resource('category','categorycontroller');
        Route::resource('post','postcontroller');
        Route::get('/pending/post','PostController@pending')->name('post.pending');
        Route::put('/post/{id}/approve','PostController@approval')->name('post.approve');
        Route::resource('subscriber','subscribercontroller');
        Route::resource('slider','slidecontroller');
     
        Route::get('authors','AuthorController@index')->name('author.index');
        Route::get('authors/show/{id}','AuthorController@show')->name('author.show');

        Route::get('authors/pending','AuthorController@pending')->name('author.pending');

        Route::get('/authors/active/{id}','AuthorController@active')->name('author.active');
        Route::put('/authors/active/{id}','AuthorController@update')->name('author.update');

        Route::resource('aboutsite','aboutsitecontroller');
        Route::resource('adminreunion','reunioncontroller');
        Route::delete('authors/{id}','AuthorController@destroy')->name('author.destroy');

        Route::resource('/committeemember','committieeadmincontroller');


});

Route::group(['as'=>'author.','prefix'=>'author','namespace'=>'author','middleware'=>['auth','author']],function(){

    Route::get('dashboard','authorDeshboardController@index')->name('dasboard');
    Route::resource('post','postcontroller');

    Route::get('settings','SettingsController@index')->name('settings');
    Route::put('profile-update','SettingsController@updateProfile')->name('profile.update');
    Route::put('password-update','SettingsController@updatePassword')->name('password.update');

});

Route::post('subscriber','subscribercontroller@store')->name('subscriber');
