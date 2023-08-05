<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', [LoginController::class, 'index'])->middleware('guest');
Route::Post('/register/post', [LoginController::class, 'regPost'])->middleware('guest');
Route::post('/login/post', [LoginController::class, 'logPost'])->middleware('guest');
Route::get('/logout', [LoginController::class, 'logout']);

Route::get('/homepage', [PagesController::class, 'index']);
Route::get('/profile', [PagesController::class, 'profile']);
Route::put('/change/{id}', [PagesController::class, 'changeP']);












