<?php

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
// PATIENT 
Route::get('/', function () {
    return view('patients.home');
});

// ADMIN
Route::prefix('admin')->group(function () {

    // Route cho trang admin chính
    Route::get('/', function () {
        return view('layouts.admin.admin');
    });

    // Route cho quản lý bệnh nhân
    Route::prefix('patients')->group(function () {
        Route::get('/', function () {
            return view('admin.patients.patients');
        });

        Route::get('/create', function () {
            return view('admin.patients.create_patient');
        });

        Route::get('/edit', function () {
            return view('admin.patients.update_patient');
        });
    });

    // Route cho quản lý bác sĩ
    Route::prefix('doctors')->group(function () {
        Route::get('/', function () {
            return view('admin.doctors.doctors');
        });

        Route::get('/create', function () {
            return view('admin.doctors.create_doctor');
        });

        Route::get('/edit', function () {
            return view('admin.doctors.update_doctor');
        });
    });

    // Route cho bảng điều khiển admin
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });

    // Route cho quản lý cuộc hẹn
    Route::get('/appointment', function () {
        return view('admin.appointments.appointment');
    });

});
