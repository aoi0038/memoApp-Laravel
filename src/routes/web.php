<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemoController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [MemoController::class, 'index']);
Route::get('/memo/create', [MemoController::class, 'create'])->name('memo.create');
Route::post('/memo/store', [MemoController::class, 'store'])->name('memo.store');
Route::get('/memo/edit/{id}', [MemoController::class, 'edit'])->name('memo.edit');
Route::post('/memo/destroy/{id}', [MemoController::class, 'destroy'])->name('memo.destroy');
Route::get('/memo/update/{id}', [MemoController::class, 'update'])->name('memo.update');
