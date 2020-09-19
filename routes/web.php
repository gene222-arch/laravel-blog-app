<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;

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

Route::get('/', [SiteController::class, 'index'])->name('homepage');
Route::get('/aboutus', [SiteController::class, 'about_us'])->name('aboutus');
Route::get('/contactus', [SiteController::class, 'contact_us'])->name('contactus');
Route::get('/services', [SiteController::class, 'services'])->name('services');

Route::resource('posts', PostsController::class);

Auth::routes();
Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

Route::get('/user/profile', [ProfilesController::class, 'index']);
Route::get('/user/edit-profile', [ProfilesController::class, 'edit']);
Route::post('/user/profile/{post}', [ProfilesController::class, 'update']);