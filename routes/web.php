<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-game', function () {
    return view('new-game.index');
});
Route::get('/new-move/{id}', function () {
});




Route::post('/new-game/{id}', 'GameController@store');

Route::get('/make-move/{id}','GameController@postMove');
Route::post('/make-move/{id}','GameController@makeMove');


Route::group(['middleware' => 'web'], function () {
    Route::auth();
});
Auth::routes();

Route::get('/home', 'HomeController@index');
