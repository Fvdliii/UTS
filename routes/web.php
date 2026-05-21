<?php

use App\Http\Controllers\IncomeController;
use App\Http\Controllers\OutcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',  [IncomeController::class, 'index']);

Route::get('/income', [IncomeController::class, 'index'])->name('income.index');
Route::get('/income/create', [IncomeController::class, 'create'])->name('income.create');
Route::post('/income/store', [IncomeController::class, 'store'])->name('income.store');
Route::get('/income/{income}/edit', [IncomeController::class, 'edit'])->name('income.edit');
Route::get('/income/recycle',[IncomeController::class, 'recycle'])->name('income.recycle');
Route::put('/income/{income}', [IncomeController::class, 'update'])->name('income.update');
Route::delete('/income/{income}', [IncomeController::class, 'destroy'])->name('income.destroy');
Route::get('/income/{income}', [IncomeController::class, 'show'])->name('income.show');

Route::resource('outcome', OutcomeController::class);

