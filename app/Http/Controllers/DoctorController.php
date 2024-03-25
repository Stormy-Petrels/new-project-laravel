<?php
namespace App\Http\Controllers;

use App\Repositories\DoctorRepository;

class DoctorController extends Controller
{
    public function index(){
        $request = new DoctorRepository;
        return view('patients.doctors',['doctors' => $request->getAllDoctor()]);
    }
}
