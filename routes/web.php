<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::redirect('/', '/home', '301');
Auth::routes(['register' => false]);





Route::get('/home', 'HomeController@index')->name('home');


Route::resource('users', 'Users\UserController');


// Route::get('/test', function () {
//     return 123;
// });
