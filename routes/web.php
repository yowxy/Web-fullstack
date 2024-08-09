<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})-> name('home');


// pake  \\ ya bukan pake // kalo mau pke Controllers

Route::namespace('App\Http\Controllers\Auth')->group(function(){
    Route::get('login', 'LoginController@show')->name('auth.login.show');
    Route::post('login', 'LoginController@login')->name('auth.login.login');
    Route::post('logout', 'LoginController@logout')->name('auth.login.logout');
});


Route::get('sign-up', function () {
    return view('pages.auth.sign-up');
})->name('auth.sign-up.show')  ;

Route::get('discussions', function () {
    return view('pages.discussions.index');
})-> name('discussions.index')  ;

Route::get('discussions/lorem', function () {
    return view('pages.discussions.show');
})-> name('discussions.show');


Route::get('discussions/create', function () {
    return view('pages.discussions.form');
})-> name('discussions.create');

Route::get('answer/1', function () {
    return view('pages.answer.form');
})-> name('answer.edit');

Route::get('users/iklil', function () {
    return view('pages.users.show');
})-> name('users.show');

Route::get('users/iklil/edit', function () {
    return view('pages.users.form');
})-> name('users.form');
