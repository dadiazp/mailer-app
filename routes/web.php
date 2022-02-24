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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin');

Route::get('/home/mail', [App\Http\Controllers\MailController::class, 'home'])->name('home.mails');
Route::get('/mails', [App\Http\Controllers\MailController::class, 'index'])->name('mails');
Route::post('/mail', [App\Http\Controllers\MailController::class, 'index'])->name('mail.create');

Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
Route::get('/user/delete/{user_id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('user.delete');

Route::get('/get-states/{country_id}', [App\Http\Controllers\StateController::class, 'getStatesByCountry']);
Route::get('/get-cities/{state_id}', [App\Http\Controllers\CityController::class, 'getCitiesByState']);



