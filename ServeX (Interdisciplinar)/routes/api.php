<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\ApiController;

Route::namespace('Api')->group(function(){
    Route::get('/technicalities', [ApiController::class, 'getTechnicalities']);
    Route::get('/technicalities/{category}', [ApiController::class, 'getTechnicalitiesByCategory']);
    Route::get('/categories', [ApiController::class, 'getCategories']);
    Route::get('/categories/{id}', [ApiController::class, 'getCategoriesByTechnicalityId']);
});