<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoursesController;

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
})->name('login'); 

Route::post('/login', [LoginController::class, 'customLogin']);


// Route::get('/profile', function () {
//     return view('admin/profile');
// })->middleware('auth');

Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth');


// Route::get('/users', function () {
//     return view('admin/users');
// })->middleware('auth');

// Route::get('/users/{id}', [UserFormController::class, 'show'])->middleware('auth');
// Route::put('/users/{id}', [UserFormController::class, 'update'])->middleware('auth');

Route::get('/users', [UserFormController::class, 'index'])->middleware('auth');
Route::post('/users', [UserFormController::class, 'store'])->middleware('auth');
Route::get('/users/{id}', [UserFormController::class, 'show'])->middleware('auth');
Route::put('/users/{id}', [UserFormController::class, 'update'])->middleware('auth');
Route::delete('/users/{id}', [UserFormController::class, 'destroy'])->middleware('auth');


// Route::post('/users', [UserFormController::class, 'ContactUsForm'])->name('contact.store');




Route::group(['middleware' => ['role:Super-Admin']], function () {
    Route::get('/courses', [CoursesController::class, 'index'])->middleware('auth');
    Route::post('/courses', [CoursesController::class, 'store'])->middleware('auth');
    Route::get('/courses/{id}', [CoursesController::class, 'show'])->middleware('auth');
    Route::put('/courses/{id}', [CoursesController::class, 'update'])->middleware('auth');
    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])->middleware('auth');

    Route::post('/courses/ps', [CoursesController::class, 'addProgramStructure'])->middleware('auth');

});

// Route::get('/courses', function () {
//     return view('admin/courses');
// });

Route::get('/photos', function () {
    return view('admin/photos');
});

Route::get('/placement', function () {
    return view('admin/placement');
});

Route::get('/news', function () {
    return view('admin/news');
});

Route::get('/phd', function () {
    return view('admin/phd');
});


Route::get('/logout', [LoginController::class, 'logout']);
