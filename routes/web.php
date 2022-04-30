<?php

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

Auth::routes();

Route::resource('postsuser', PostsUserController::class);

Route::resource('profile', ProfileController::class);

Route::resource('tags', TagsController::class);

Route::resource('comments', CommentsController::class);

Route::resource('editcommentact', EditCommentActController::class);

//Route::get('/postsuser', 'PostsUserController@index')->name('postsuser');

//Route::get('/crearcomentario', 'CommentsController@create')->name('crearcomentario');

Route::get('/createposts', 'PostsUserController@create')->name('createposts');

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/profile', 'ProfileController@index')->name('profile');

//Route::get('/postsuser', 'PostsUserController@index')->name('postsuser');

/*Route::get //index show 
Route::put //update
Route::delete //eliminar
Route::post //store*/

Route::put('post/{id}', function ($id) {
    //
})->middleware('auth', 'role::admin');

Route::put('comment/{id}', function ($id) {
    //
})->middleware('auth', 'role::admin');

/*Route::resource([
    'properties'=>'PropertyController',
    'publications'=>'PublicationController'
        ]);*/