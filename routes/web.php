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
    // return redirect('https://dcs.cusat.ac.in/');
});

Route::get('/login', function () {
    return view('admin/login');
});

Route::get('/profile', function () {
    return view('admin/profile');
});

Route::get('/users', function () {
    return view('admin/users');
});

Route::get('/courses', function () {
    return view('admin/courses');
});

Route::get('/photos', function () {
    return view('admin/photos');
});



