<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemCategoryController;
use App\Http\Controllers\PenerimaanBarangController;
use App\Http\Controllers\PengeluaranBarangController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/category', [ItemCategoryController::class, 'index']);
Route::post('/category', [ItemCategoryController::class, 'store']);
Route::get('/category/{id}', [ItemCategoryController::class, 'show']);
Route::put('/category/{id}', [ItemCategoryController::class, 'update']);
Route::delete('/category/{id}', [ItemCategoryController::class, 'destroy']);

Route::get('/item', [ItemController::class, 'index']);
Route::post('/item', [ItemController::class, 'store']);
Route::get('/item/{id}', [ItemController::class, 'show']);
Route::put('/item/{id}', [ItemController::class, 'update']);
Route::delete('/item/{id}', [ItemController::class, 'destroy']);

Route::get('/penerimaan', [penerimaanbarangcontroller::class, 'index']);
Route::post('/penerimaan', [penerimaanbarangcontroller::class, 'store']);
Route::get('/penerimaan/{id}', [penerimaanbarangcontroller::class, 'show']);
Route::put('/penerimaan/{id}', [penerimaanbarangcontroller::class, 'update']);
Route::delete('/penerimaan/{id}', [PenerimaanBarangController::class, 'destroy']);

Route::get('/pengeluaran', [pengeluaranbarangcontroller::class, 'index']);
Route::post('/pengeluaran', [pengeluaranbarangcontroller::class, 'store']);
Route::get('/pengeluaran/{id}', [pengeluaranbarangcontroller::class, 'show']);
Route::put('/pengeluaran/{id}', [pengeluaranbarangcontroller::class, 'update']);
Route::delete('/pengeluaran/{id}', [PengeluaranBarangController::class, 'destroy']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
