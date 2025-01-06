<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DbController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\DecisionController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/kriteriatabel',[DbController::class, 'kriteriadata'], function () {
    return view('tabel.kriteriatabel');
})->middleware(['auth', 'verified'])->name('dashboard');;
Route::put('/kriteriaupdate/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');


Route::get('/alternatif',[DecisionController::class, 'nilai'], function () {
    return view('tabel.alternatif');
})->middleware(['auth', 'verified'])->name('dashboard');;
Route::post('/alternatif', [DecisionController::class, 'store'])->name('decision.store');
Route::get('/alternatif', [DecisionController::class, 'nilai'])->name('decision.nilai');
Route::put('/alternatif/{id}/update', [DecisionController::class, 'update'])->name('decision.update');
Route::delete('/alternatif/{id}/delete', [DecisionController::class, 'delete'])->name('decision.delete');

Route::get('/normalisasi', [DecisionController::class, 'normalization'])->name('decision.normalization');

Route::get('/rank', [DecisionController::class, 'ranking'])->name('decision.ranking');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
