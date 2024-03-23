<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        return view('admin.doctors.doctors');
    }

    public function create()
    {
        return view('admin.doctors.create_doctor');
    }

    public function update()
    {
        return view('admin.doctors.update_doctor');
    }
}

