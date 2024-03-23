<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Patient\PageDoctorController;
use App\Http\Controllers\BookingController;
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

Route::get('/page/doctor', [PageDoctorController::class, 'index']);
Route::get('/page/doctor/{id}/booking', [BookingController::class, 'index']);
Route::post('/patient/list-doctor/booking/time', [BookingController::class, 'checkTime']);
Route::post('/create/doctor', [PageDoctorController::class, 'index']);

