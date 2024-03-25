<?php

namespace App\Http\Controllers;

use App\Repositories\DoctorRepository;
use Illuminate\Http\Request;
use App\Dtos\Patient\BookingReq;
use App\Repositories\BookingRepository;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index($id){
        $doctorRepository = new DoctorRepository;
        return view("patients.Booking", ['doctor' => $doctorRepository->getDoctorById($id)], ['times' => $doctorRepository->getAllTimeDoctor()]);
    }

    
    public function checkTime(Request $req)
    {
        $requestDay = $req;
        $request = new DoctorRepository;
        $day = $requestDay->selectedDate;
        $listTime = $request->getAvailableTimesForBooking($day);
        return response()->json([
            'message' => 'List time user',
            'listTime' => $listTime
        ], 201);
    }

    public function booking(Request $req)
    {
        $requestBooking = new BookingReq($req);
        if ($requestBooking->id == "") {
            return response()->json([
                'message' => 'Appointment failed',
            ], 404);
        }
        $newBooking = new Booking($requestBooking->patientId, $requestBooking->doctorId, $requestBooking->date, $requestBooking->id);
        $booking = new BookingRepository();
        $result = $booking->insert($newBooking);

        return response()->json([
            'message' => 'You have successfully booked your appointment',
        ], 200);
    }
}
