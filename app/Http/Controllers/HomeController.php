<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $banners=Banner::all();
        return view('patients.home', compact('banners'));
    }
    public function aboutUs() {
        $banners=Banner::all();
        return view('patients.aboutUs', compact('banners'));
    }
    
    public function services() {
        $banners=Banner::all();
        return view('patients.services', compact('banners'));
    }
}