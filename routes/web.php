<?php

use App\Http\Controllers\SavingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\User;

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

Route::get('/', [SavingController::class, 'index']);
Route::get('/dashboard', [SavingController::class, 'index']);
Route::get('/create', [SavingController::class, 'create']);
Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'inputRegister']);
Route::post('/create/store', [SavingController::class, 'store']);
Route::get('/setor/{id}', [SavingController::class, 'setor']);
Route::get('/tarik/{id}', [SavingController::class, 'tarik']);
Route::patch('/updateSetor/{id}', [SavingController::class, 'updateSetor']);
Route::patch('/updateTarik/{id}', [SavingController::class, 'updateTarik']);
Route::get('/delete/{id}', [SavingController::class, 'destroy'])->name('delete');      
