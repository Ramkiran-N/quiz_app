<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\IndexController;

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


Route::any('/register', [AuthController::class, 'signupIndex'])->name('signup.show');
Route::any('/signup', [AuthController::class, 'signup'])->name('signup');
Route::any('/login', [AuthController::class, 'loginIndex'])->name('login.index');
Route::any('/authenticate', [AuthController::class, 'authenticate'])->name('authenticate');
Route::middleware(['auth'])->group(function () {
    Route::any('/', [IndexController::class, 'index'])->name('index');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::any('/category/{category}/{no}/{ans}', [IndexController::class, 'question']);
    Route::any('/result', [IndexController::class, 'result'])->name('result');
    Route::any('/reset', [IndexController::class, 'reset'])->name('reset');
});


