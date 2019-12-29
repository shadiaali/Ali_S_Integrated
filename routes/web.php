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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/post/create', 'PostController@create')->name('post.create');
Route::post('/post/store', 'PostController@store')->name('post.store');
Route::get('/posts', 'PostController@index')->name('posts');
Route::get('/post/show/{id}', 'PostController@show')->name('post.show');
Route::post('/comment/store', 'CommentController@store')->name('comment.add');
Route::post('/reply/store', 'CommentController@replyStore')->name('reply.add');
Route::get('posts/search', 'PostController@search')->name('post.search');


//creating a new route, namespacing it and giving it a prefix
//this allows you to shorten the route when writing routes
//the prefix once specified will insert itself before your url
//all routes put in this group will have the namespace, prefix and the name automatically applied
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){

    //accessing the users from the admin panel EXCEPT the methods we removed
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);


});

Route::get('users/{id}/details', 'Admin\UsersController@details')->name('admin.users.details');


