<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MailController;
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

Route::group(['prefix' => 'dashboard'], function () {
    Route::get('', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('/{order}/edit', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::put('/{order}', [DashboardController::class, 'update'])->name('dashboard.update');
    Route::delete('/{order}', [DashboardController::class, 'destroy'])->name('dashboard.destroy');
});

Route::get('send-mail', [MailController::class, 'sendMail'])->name('send-mail');
