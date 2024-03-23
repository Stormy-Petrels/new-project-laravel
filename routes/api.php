<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/admin/doctors", [DoctorController::class, 'index']);
// Route::post("/admin/doctors", [DoctorController::class, 'create']);
Route::post("/admin/doctors", [DoctorController::class, 'store']);
Route::post("/admin/doctors/{id}", [DoctorController::class, 'update']);
Route::delete("/admin/doctors/delete/{id}", [DoctorController::class, 'destroy']);