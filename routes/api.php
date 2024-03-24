<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
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


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    ///Route cho quản lý bệnh nhân
    Route::prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index']);
        Route::get('/create', [PatientController::class, 'create'])->name('create');
        Route::post('/create', [PatientController::class, 'store'])->name('admin.patients.store');
       Route::get('{user_id}/update', [PatientController::class, 'edit'])->name('edit');
       Route::put('{id}/update', [PatientController::class, 'update'])->name('update');
    });

    // Route cho quản lý bác sĩ
    Route::prefix('doctors')->group(function () {
        Route::get('/', [DoctorController::class, 'index']);
        Route::get('/create', [DoctorController::class, 'create'])->name('create');
        Route::get('/update', [DoctorController::class, 'update'])->name('update');
    });

    // Route cho bảng điều khiển admin
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Route cho quản lý cuộc hẹn
    Route::get('/appointment', [AppointmentController::class, 'index']);

});


Route::get('admin/patients/{user_id}/update',[PatientController::class, 'edit']);
Route::put('admin/patients/{id}/update',[PatientController::class, 'update']);