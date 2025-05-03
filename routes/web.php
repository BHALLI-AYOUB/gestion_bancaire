<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BonController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route pour afficher les bons par banque
Route::get('/bank/{bankName}', [BonController::class, 'showBank'])->name('bons.show');


// Route pour supprimer un bon
Route::delete('/bons/{id}', [BonController::class, 'destroy'])->name('bons.destroy');

// Route pour créer un bon
Route::get('/create', [BonController::class, 'create'])->name('bons.create');

// Route pour stocker un bon

Route::post('/store', [BonController::class, 'store'])->name('bons.store');

// Route pour télécharger les bons en PDF
Route::get('/download-pdf/{bankName}/{type}', [BonController::class, 'downloadPDF'])->name('bons.downloadPDF');
Route::post('/store', [BonController::class, 'store'])->name('bons.store');
// routes/web.php
// Utiliser resource route pour gérer CRUD operations
Route::get('bons', [BonController::class])->name('bons');
// Route::get('/bank/{bankName}', [BonController::class, 'showBank'])->name('bons.show');
Route::post('/store', [BonController::class, 'store'])->name('bons.store');
// Route::delete('/bons/{id}', [BonController::class, 'destroy'])->name('bons.destroy');
// Route::get('/download-pdf/{bankName}/{type}', [BonController::class, 'downloadPDF'])->name('bons.downloadPDF');
Route::get('/download-pdf/{bankName}/{type}', [BonController::class, 'downloadPDF'])->name('bons.downloadPDF');
Route::get('/route-to-fetch-all-bons', [BonController::class, 'fetchAllBons']);
Route::get('/bank/{bankName}/vider', [BonController::class, 'vider'])->name('bons.vider');

Route::get('/bank', [BonController::class, 'showBankSelection'])->name('bons.index');

