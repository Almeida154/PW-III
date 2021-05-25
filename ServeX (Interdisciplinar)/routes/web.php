<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GeneralController;

// Website

Route::get('/', [GeneralController::class, 'dashboardView']);
Route::get('/detail/{id}', [GeneralController::class, 'detailView'])->name('detail');
Route::get('/filter/{categ}', [GeneralController::class, 'filteredView']);
Route::get('/search', [GeneralController::class, 'searchView']);

// Admin

Route::get('/create', [GeneralController::class, 'createView']);
Route::post('/create', [GeneralController::class, 'create']);