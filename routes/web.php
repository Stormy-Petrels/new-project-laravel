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

Route::get('/', function () {
    return view('layouts/admin/admin');
});

Route::get('/admin/patients', function () {
    return view('admins/patients/patients');
});

Route::get('/admin/patient/create', function () {
    return view('admins/patients/add-patient');
});

Route::get('/admin/patient/edit', function () {
    return view('admins/patients/edit-patient');
});


Route::get('/admin/doctors', function () {
    return view('admins/doctors/doctors');
});

Route::get('/admin/doctor/create', function () {
    return view('admins/doctors/add-doctor');
});

Route::get('/admin/doctor/edit', function () {
    return view('admins/doctors/edit-doctor');
});


Route::get('/admin/dashboard', function () {
    return view('admins/dashboard');
});

Route::get('/admin/appointment', function () {
    return view('admins/appointments/appointment');
});