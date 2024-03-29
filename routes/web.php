<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageDoctorController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SignInController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminPatientController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AdminDoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\SignUpController;
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
// PATIENT
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about-us', [HomeController::class, 'aboutUs']);
Route::get('/contact-us', [HomeController::class, 'contactUs']);
// Route::get('/doctors', [HomeController::class, 'doctors']);
Route::get('/doctors', [DoctorController::class, 'index']);
Route::get('/services', [HomeController::class, 'services']);
//Common
Route::get('/sign-in', [SignInController::class, 'index']);
Route::post('/api/sign-in',[SignInController::class, 'signIn']);
// ADMIN
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);

    Route::prefix('patients')->group(function () {
        Route::get('/', [AdminPatientController::class, 'index']);
        Route::get('/create', [AdminPatientController::class, 'create'])->name('create');
        Route::post('/create', [AdminPatientController::class, 'store'])->name('admin.patients.store');
        Route::get('{user_id}/update', [AdminPatientController::class, 'edit'])->name('edit.patient');
        Route::put('{user_id}/update', [AdminPatientController::class, 'update'])->name('update.patient');
        Route::delete('{user_id}/delete', [AdminPatientController::class, 'destroy'])->name('delete_patient');
    });

    // Route cho quản lý bác sĩ
    Route::prefix('doctors')->group(function () {
        Route::get('/', [AdminDoctorController::class, 'index']);
        Route::get('/create', [AdminDoctorController::class, 'create'])->name('create');
        Route::post('/create', [AdminDoctorController::class, 'store'])->name('store');
        Route::get('/doctor/{id}', [AdminDoctorController::class, 'edit'])->name('edit');
        Route::post('/doctor/{id}', [AdminDoctorController::class, 'update'])->name('update');
        Route::get("/delete/doctor/{id}", [AdminDoctorController::class, 'destroy'])->name('destroy');
    });

    // Route cho bảng điều khiển admin
    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // Route cho quản lý cuộc hẹn
    Route::get('/appointment', [AppointmentController::class, 'index']);
});


Route::get('/doctor/{id}/booking', [BookingController::class, 'index']);
Route::post('/patient/list-doctor/booking/time', [BookingController::class, 'checkTime']);
Route::post('/patient/list-doctor/booking', [BookingController::class, 'booking']);