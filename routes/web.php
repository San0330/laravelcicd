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
    return view('index');
});

Route::get('/about-us', function () {
    return view('about');
})->name('about-us');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Only authenticated members can access these routes
Route::group(['middleware' => ['auth']], function () {

   Route::get('posts/create', 'PostController@create')->name('posts.create');
   Route::post('posts', 'PostController@store')->name('posts.store');
   Route::get('posts/{post}/edit', 'PostController@edit')->name('posts.edit');
   Route::delete('posts/{post}/destroy', 'PostController@destroy')->name('posts.destroy');
   Route::patch('posts/{post}/update', 'PostController@update')->name('posts.update');

});

Route::get('posts', 'PostController@index')->name('posts.index');
Route::get('posts/{post}', 'PostController@show')->name('posts.show');

