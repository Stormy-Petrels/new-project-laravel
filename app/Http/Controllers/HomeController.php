<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index() {
        $banners=Banner::all();
        $topDoctors = DB::table('doctors')
        ->join('booking', 'doctors.id', '=', 'booking.doctor_id')
        ->join('users', 'doctors.user_id', '=', 'users.id')
        ->select('doctors.id', 'users.name', DB::raw('count(*) as total_bookings'))
        ->groupBy('doctors.id', 'users.name')
        ->orderByDesc('total_bookings')
        ->limit(4)
        ->get();
        return view('patients.home', compact('banners'), compact('topDoctors'));
    }
    public function aboutUs() {
        $banners=Banner::all();
        return view('patients.aboutUs', compact('banners'));
    }
    
    public function services() {
        return view('patients.services');
    }
}