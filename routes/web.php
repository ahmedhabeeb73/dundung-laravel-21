<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Job\JobsController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WorksController;
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

Route::get('/',[WelcomeController::class,'index'])->name('welcome.index');

Route::get('/jobs',[JobsController::class,'index'])->name('jobs');
Route::resource('/works',WorksController::class);
//for category and tags
Route::get('/jobs/categories/{category}',[JobsController::class,'category'])->name('job.category');
Route::get('/jobs/tags/{tag}',[JobsController::class,'tag'])->name('job.tag');

Auth::routes();


Route::middleware(['auth'])->group(function (){
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/trashed-jobs', [WorksController::class, 'trashed'])->name('trashed');
    Route::put('/restore-jobs/{work}', [WorksController::class, 'restore'])->name('restore');

    Route::resource('/categories',CategoriesController::class);
    Route::resource('/tags',TagsController::class);

    Route::get('/users/profile',[UsersController::class,'edit'])->name('users.edit-profile');
    Route::put('/users/profile',[UsersController::class,'update'])->name('users.update-profile');

});

Route::middleware(['auth', 'admin'])->group(function (){

    Route::get('/users',[UsersController::class,'index'])->name('users.index');
    Route::post('/users/{user}/make-admin',[UsersController::class,'makeAdmin'])->name('users.make-admin');
    Route::post('/users/{user}/make-notAdmin',[UsersController::class,'makeNotAdmin'])->name('users.make-Not-admin');
});



