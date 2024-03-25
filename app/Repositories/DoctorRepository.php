<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DoctorRepository
{
    private string $tableName = "doctors";

    public function insert_doctor(Doctor $doctor)
    {
        $sql = "INSERT INTO $this->tableName (id, user_id, specialization, description, created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [
            $doctor->getId(),
            $doctor->getId(),
            $doctor->specialization,
            $doctor->description,
            Carbon::now(),
            Carbon::now(),

        ]);
    }


    public function getAllTimeDoctor()
{
    $query = "SELECT time_start, time_end FROM list_time_doctor";
    $result = DB::select($query);
    return $result;
}

    public function getAllDoctor()
    {
        return DB::table('users')
            ->join('doctors', 'users.id', '=', 'doctors.user_id')
            ->where('users.role', 'doctor')
            ->get();
    }

    public function getDoctorById(string $id)
    {
    $doctor = DB::table('users')
        ->leftJoin('doctors', 'users.id', '=', 'doctors.user_id')
        ->where('users.id', $id)
        ->select('users.*', 'doctors.description', 'doctors.specialization')
        ->first();
        return $doctor;
    }
    
    public function getAvailableTimesForBooking($selectedDate)
    {
        $query = "SELECT list_time_doctor.id, list_time_doctor.time_start, list_time_doctor.time_end, list_time_doctor.price
                  FROM list_time_doctor
                  LEFT JOIN booking ON list_time_doctor.id = booking.time_id AND booking.date_booking = ?
                  WHERE booking.time_id IS NULL";
        $result = DB::select($query, [$selectedDate]);
        return $result;
    }
}
