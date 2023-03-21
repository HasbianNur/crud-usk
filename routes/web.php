<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [PostController::class, 'welcome']);

Route::group(['middleware' => 'revalidate'], function()
{
    Route::resource('post', PostController::class)->middleware('auth');
    Route::get('/create', [PostController::class, 'create'])->name('create')->middleware('auth');
    Route::get('home', [PostController::class, 'index'])->name('home')->middleware('auth');
    Route::get('login', [LoginController::class, 'index'])->name('login')->middleware('guest');
});
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');
