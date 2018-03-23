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

//Using closure
// Route::get('about-us', function () {
//     echo 'About Us';
// });

//Using controller method's name
Route::get('about-us','AboutUsController@details')->name('static.about.us');

//Using __invoke
Route::get('contact-us','ContactUsController')->name('static.contact.us');

Route::get('users','UserController@index')->name('static.users');
Route::get('users/{user}/show','UserController@show')->name('users.show');
Route::get('users/{user}/edit','UserController@edit')->name('users.edit')->middleware('auth');
Route::patch('users/{user}','UserController@update')->name('users.update')->middleware('auth');
Route::delete('users/{user}','UserController@destroy')->name('user.destroy')->middleware('auth');
Route::get('users/create','UserController@create')->name('users.create')->middleware('auth');
Route::post('users','UserController@store')->name('users.store')->middleware('auth');

// Route::resource('posts', 'PostController')->only('index','show', 'edit', 'store', 'create','update', 'destroy');
Route::resource('posts', 'PostController');