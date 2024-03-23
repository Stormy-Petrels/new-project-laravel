<?php

namespace App\Http\Controllers;
use App\Repositories\DoctorRepository;

class PageDoctorController extends Controller
{
    public function index(){
        $request = new DoctorRepository;
        return view('DoctorList',['doctors' => $request->getAllDoctor()]);
    }
}
