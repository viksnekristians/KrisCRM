<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great
|
*/

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes(['login' => false]);
Auth::routes(['register' => false]);

Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::get('admin', [App\Http\Controllers\AdminController::class, 'index']);
Route::get('admin/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);
Route::get('admin/manage', [App\Http\Controllers\AdminController::class, 'manage']);
Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('admin/store', [App\Http\Controllers\AdminController::class, 'store']);
/*Route::get('admin/create', [App\Http\Controllers\AdminController::class, 'create']);
Route::post('admin/create', [App\Http\Controllers\AdminController::class, 'store']);*/
Route::get('s/{subscriber}', [App\Http\Controllers\SubscriberController::class, 'show']);
Route::post('s/create', [App\Http\Controllers\StoreSubscriberController::class, 'store']);
Route::post('s/{subscriber}/delete', [App\Http\Controllers\SubscriberController::class, 'delete']);
Route::delete('/s/delete', [App\Http\Controllers\SubscriberController::class, 'massDelete']);
Route::get('/email/send/{subscriber}', [App\Http\Controllers\SendEmailController::class, 'send']);
Route::post('/email/sendone/{subscriber}', [App\Http\Controllers\SendEmailController::class, 'sendOne']);
Route::get('/email/sendall', [App\Http\Controllers\SendEmailController::class, 'sendAllView']);
Route::post('/email/sendall', [App\Http\Controllers\SendEmailController::class, 'sendAll']);