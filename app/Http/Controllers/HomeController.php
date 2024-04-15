<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('patients.home');
    }
    public function aboutUs() {
        return view('patients.aboutUs');
    }
    
    public function services() {
        return view('patients.services');
    }
}