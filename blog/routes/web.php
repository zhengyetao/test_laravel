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

Route::get('welcome', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::any('any', function () {
    return 'any';
});

// php
Route::get('user/{id?}', function ($id=1) {
    return view('user.profile', ['id' => $id]);
})->name('user.profile');

// blade
Route::get('page/{id}', function ($id) {
    return view('page.show', ['id' => $id]);
})->where('id', '[0-9]+');

// css
Route::get('page/css', function () {
    return view('page.style');
});

// blade
Route::get('dashboard', function () {
    return view('dashboard');
});



Route::get('page/{id}/{slug}', function ($id, $slug) {
    return $id . ':' . $slug;
})->where(['id' => '[0-9]+', 'slug' => '[A-Za-z]+']);

Route::group([], function () {
    Route::get('hello', function () { return 'Hello'; });
    Route::get('world', function () { return 'World'; });
});
    
Route::prefix('api')->group(function () {
    Route::get('/', function () { return 'index'; })->name('api.index');
    Route::get('users', function () { return 'users'; })->name('api.users');
});


//Route::get('task', 'TaskController@home');

Route::resource('post', 'PostController');

//Route::get('task/{task}', function (\App\Models\Task $task) {
//    dd($task);
//});

Route::get('task/{task_model}', function (\App\Models\Task $task) {
    dd($task);
});

Route::fallback(function() {
    return '我是最后的屏障';
});
