<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('patients.home');
    }
    public function contactUs() {
        return view('patients.contactUs');
    }
    public function aboutUs() {
        return view('patients.aboutUs');
    }
    public function doctors() {
        return view('patients.doctors');
    }
    public function services() {
        return view('patients.services');
    }
}
