<?php

namespace App\Http\Controllers;

use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(string $id){
        $doctorRepository = new DoctorRepository;
        return view("patients.Booking", ['doctor' => $doctorRepository->getDoctorById($id)], ['times' => $doctorRepository->getAllTimeDoctor()]);
    }

    
    public function checkTime(Request $req)
    {
        $requestDay = $req;
        $request = new DoctorRepository;
        $day = $requestDay->date;
        $listTime = $request->getAvailableTimesForBooking($day);
        return response()->json([
            'message' => 'List time user',
            'listTime' => $listTime
        ], 201);
    }
}
