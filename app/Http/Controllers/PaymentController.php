<?php

namespace App\Http\Controllers;
use App\Dtos\Patient\SearchReq;
use App\Repositories\DoctorRepository;
use App\Repositories\PatientRepository;
use Illuminate\Http\Request;
use App\Dtos\Patient\BookingReq;
use App\Repositories\BookingRepository;

class PaymentController extends Controller
{
    public function index(Request $req)
    {
        $requestBooking = new BookingReq($req);
        $doctorRepository = new DoctorRepository;
        $patientRepository = new PatientRepository;
        return view("patients.Payment", ['doctor' => $doctorRepository->getDoctorById( $requestBooking->doctorId)], ['patient' => $patientRepository-> get_patient_by_id($requestBooking->patientId)],['date' => $requestBooking->date], ['time' => $requestBooking->id]);
    }
}