<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SiteController;
use App\Http\Controllers\MailsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\PhoneController;
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


Route::get('/default/{language}', function ($language) {

    App::setLocale($language);
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Site Controller
|--------------------------------------------------------------------------
|
*/
    Route::get('/', [SiteController::class, 'index'])->name('homepage');
    Route::get('/aboutus', [SiteController::class, 'about_us'])->name('aboutus');
    Route::get('/contactus', [SiteController::class, 'contact_us'])->name('contactus');
    Route::get('/services', [SiteController::class, 'services'])->name('services');

/*
|--------------------------------------------------------------------------
| Posts Controller
|--------------------------------------------------------------------------
|
*/
    Route::resource('posts', PostsController::class);

/*
|--------------------------------------------------------------------------
| Auth Controller/User
|--------------------------------------------------------------------------
|
*/
    Auth::routes();
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/user/profile', [ProfilesController::class, 'index'])->name('profile');
    Route::get('/user/edit-profile', [ProfilesController::class, 'edit'])->name('edit-profile');
    Route::post('/user/profile/update/{post}', [ProfilesController::class, 'update'])->name('update-profile');

/*
|--------------------------------------------------------------------------
| Mail Controller
|--------------------------------------------------------------------------
|
*/
    Route::get('/testmail', [MailsController::class, 'index']);
    Route::post('/contactus', [MailsController::class, 'store'])->name('mail.send');


/*
|--------------------------------------------------------------------------
| PhoneController
|--------------------------------------------------------------------------
|
*/

Route::get('/add-user', [PhoneController::class, 'store']);
Route::get('/user/phone/{id}', [PhoneController::class, 'show']);
Route::get('/user/innerjoin/{id}', [PhoneController::class, 'innerJoin']);
Route::get('/user/leftjoin', [PhoneController::class, 'leftJoin']);
Route::get('/user/rightJoin', [PhoneController::class, 'rightJoin']);

/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
|
*/

Route::get('/payment', function () {

    return \App\PaymentGateway\Payment::process();
});
