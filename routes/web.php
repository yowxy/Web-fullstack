<?php

use App\Http\Controllers\AnswerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\My\UserController;
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

Route::middleware('auth')->group(function () {
    // Route group with namespace for resource controller
    Route::namespace('App\Http\Controllers')->group(function() {
        Route::resource('discussions', DiscussionController::class)
        ->only(['create', 'store', 'edit', 'update', 'destroy']);
        // Additional routes for liking and unliking discussions
        Route::post('discussions/{discussion}/like', 'LikeController@discussionLike')
            ->name('discussions.like.like');

        Route::post('discussions/{discussion}/unlike', 'LikeController@discussionUnlike')
            ->name('discussions.like.unlike');

         Route::post('discussions/{discussion}/answer', 'AnswerController@store')
            ->name('discussions.answer.store');

        Route::resource('answers', AnswerController::class)->only('edit','update','destroy');
        Route::post('answers/{answer}/like', 'LikeController@answerLike')->name('answers.like.like');
        Route::post('answers/{answer}/unlike', 'LikeController@answerUnLike')->name('answers.like.unlike');
    });


});


Route::namespace('App\Http\Controllers')->group(function() {
    Route::resource('discussions', DiscussionController::class)->only(['index', 'show']);

    Route::get('discussions/categories/{category}', 'CategoryController@show')
        ->name('discussions.categories.show');
});


Route::namespace('App\Http\Controllers\My')->group(function() {
    Route::resource('users',UserController::class)->only(['show']);
});


Route::get('/', function () {
    return view('home');
})-> name('home');


// pake  \\ ya bukan pake // kalo mau pke Controllers

Route::namespace('App\Http\Controllers\Auth')->group(function(){
    Route::get('login', 'LoginController@show')->name('auth.login.show');
    Route::post('login', 'LoginController@login')->name('auth.login.login');
    Route::post('logout', 'LoginController@logout')->name('auth.login.logout');
    Route::get('sign-up', 'SignUpController@show')->name('auth.sign-up.show')  ;
    Route::post('sign-up', 'SignUpController@signUp')->name('auth.sign-up.sign-up')  ;
});






Route::get('users/iklil/edit', function () {
    return view('pages.users.form');
})-> name('users.form');
