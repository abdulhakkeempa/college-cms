<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserFormController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\AlbumController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\PhdController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\PlacementController;
use App\Http\Controllers\AwardsController;
use App\Http\Controllers\MoUController;
use App\Http\Controllers\FundedProjectsController;


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

Route::get('/profile', [LoginController::class, 'profile'])->middleware('auth');
Route::post('/profile', [UserFormController::class, 'changePassword'])->middleware('auth');
Route::put('/profile/update', [UserFormController::class, 'updateProfile'])->middleware('auth');

Route::group(['middleware' => ['role:Super-Admin']], function () {
    Route::get('/users', [UserFormController::class, 'index'])->middleware('auth');
    Route::post('/users', [UserFormController::class, 'store'])->middleware('auth');
    Route::get('/users/{id}', [UserFormController::class, 'show'])->middleware('auth');
    Route::put('/users/{id}', [UserFormController::class, 'update'])->middleware('auth');
    Route::delete('/users/{id}', [UserFormController::class, 'destroy'])->middleware('auth');
});

Route::group(['middleware' => ['role:Super-Admin']], function () {
    Route::get('/courses', [CoursesController::class, 'index'])->middleware('auth');
    Route::post('/courses', [CoursesController::class, 'store'])->middleware('auth');
    Route::get('/courses/{id}', [CoursesController::class, 'show'])->middleware('auth');
    Route::put('/courses/{id}', [CoursesController::class, 'update'])->middleware('auth');
    Route::delete('/courses/{id}', [CoursesController::class, 'destroy'])->middleware('auth');

    Route::get('/courses/view/{id}', [CoursesController::class, 'getCourseDetails'])->middleware('auth');


    //routes for program structures
    Route::post('/courses/ps', [CoursesController::class, 'addProgramStructure'])->middleware('auth');
    Route::get('/courses/ps/{id}', [CoursesController::class, 'showProgramStructure'])->middleware('auth');
    Route::put('/courses/ps/{id}', [CoursesController::class, 'updateProgramStructure'])->middleware('auth');
    Route::delete('/courses/ps/{id}', [CoursesController::class, 'deleteProgramStructure'])->middleware('auth');

    //routes for timetable
    Route::post('/courses/tb', [CoursesController::class, 'addTimetable'])->middleware('auth');
    Route::get('/courses/tb/{id}', [CoursesController::class, 'showTimetable'])->middleware('auth');
    Route::put('/courses/tb/{id}', [CoursesController::class, 'updateTimetable'])->middleware('auth');
    Route::delete('/courses/tb/{id}', [CoursesController::class, 'deleteTimetable'])->middleware('auth');
});

// Route::get('/courses', function () {
//     return view('admin/courses');
// });

Route::group(['middleware' => ['role:Super-Admin','auth']], function () {
    Route::get('/photos', [AlbumController::class, 'index']);
    Route::post('/photos', [AlbumController::class, 'store']);
    Route::get('/photos/{id}', [AlbumController::class, 'show']);

    //routes for fetching individual album details and editing it.
    Route::get('/album/data/{id}', [AlbumController::class, 'edit']);
    Route::put('/album/data/{id}', [AlbumController::class, 'update']);

    Route::delete('/album/{id}', [AlbumController::class, 'destroy']);
    Route::post('/album/cover/{album_id}',[AlbumController::class,'setCoverPhoto']);

    //routing to get,post,delete images to/from album.
    Route::get("/photos/album/{id}",[PhotoController::class,'index']);
    Route::post('/photos/album', [PhotoController::class, 'store']);
    Route::delete("/photos/album/{id}",[PhotoController::class,'destroy'])->name("photo.delete");

});


Route::group(['middleware' => ['role:Super-Admin','auth']], function (){
    Route::get('/news', [NewsController::class, 'index']);
    Route::post('/news', [NewsController::class, 'store']);
    Route::get('/news/{id}', [NewsController::class, 'show']);
    Route::put('/news/{id}', [NewsController::class, 'update']);
    Route::delete('/news/{id}', [NewsController::class, 'destroy']);
});

Route::group(['middleware' => ['role:Super-Admin','auth']], function (){
    Route::get('/events', [EventsController::class, 'index']);
    Route::post('/events', [EventsController::class, 'store']);
    Route::get('/events/{id}', [EventsController::class, 'show']);
    Route::put('/events/{id}', [EventsController::class, 'update']);
    Route::delete('/events/{id}', [EventsController::class, 'destroy']);
});


Route::group(['middleware' => ['role:Super-Admin','auth']], function (){
    Route::get('/placement', [PlacementController::class, 'index']);
    Route::post('/placement', [PlacementController::class, 'store']);
    Route::get('/placement/{id}', [PlacementController::class, 'show']);
    Route::put('/placement/{id}', [PlacementController::class, 'update']);
    Route::delete('/placement/{id}', [PlacementController::class, 'destroy']);
});

Route::group(['middleware' => ['role:Super-Admin','auth']], function (){
    Route::get('/awards', [AwardsController::class, 'index']);
    Route::post('/awards', [AwardsController::class, 'store']);
    Route::get('/awards/{id}', [AwardsController::class, 'show']);
    Route::put('/awards/{id}', [AwardsController::class, 'update']);
    Route::delete('/awards/{id}', [AwardsController::class, 'destroy']);
});


Route::group(['middleware' => ['role:Super-Admin','auth']], function (){
    Route::get('/phd', [PhdController::class, 'index'])->middleware('auth');
    Route::post('/phd', [PhdController::class, 'store'])->middleware('auth');
    Route::get('/phd/{id}', [PhdController::class, 'show'])->middleware('auth');
    Route::put('/phd/{id}', [PhdController::class, 'update'])->middleware('auth');
    Route::delete('/phd/{id}', [PhdController::class, 'destroy'])->middleware('auth');
});

Route::group(['middleware' => ['role:Super-Admin']], function () {
    Route::get('/mou', [MoUController::class, 'index'])->middleware('auth');
    Route::post('/mou', [MoUController::class, 'store'])->middleware('auth');
    Route::get('/mou/{id}', [MoUController::class, 'show'])->middleware('auth');
    Route::put('/mou/{id}', [MoUController::class, 'update'])->middleware('auth');
    Route::delete('/mou/{id}', [MoUController::class, 'destroy'])->middleware('auth');
});

Route::group(['middleware' => ['role:Super-Admin']], function () {
    Route::get('/projects', [FundedProjectsController::class, 'index'])->middleware('auth');
    Route::post('/projects', [FundedProjectsController::class, 'store'])->middleware('auth');
    Route::get('/projects/{id}', [FundedProjectsController::class, 'show'])->middleware('auth');
    Route::put('/projects/{id}', [FundedProjectsController::class, 'update'])->middleware('auth');
    Route::delete('/projects/{id}', [FundedProjectsController::class, 'destroy'])->middleware('auth');
});

Route::get('/reports', function () {
    return view('admin/report');
})->name('report'); 

Route::get('/logout', [LoginController::class, 'logout']);
