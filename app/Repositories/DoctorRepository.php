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
        $query = "SELECT  users.id AS user_id, users.id, users.email, users.name, users.phone, users.password,
        users.address, users.url_image, doctors.id, doctors.specialization, doctors.description
        FROM users
        JOIN doctors ON users.id = doctors.user_id
        WHERE users.role = 'doctor'";

        $result = DB::select($query);
        return $result;
    }

    public function getDoctorById(string $id)
    {
        $query = "SELECT users.id AS user_id, users.email, users.name, users.phone, users.address, users.url_image, doctors.specialization, doctors.description
          FROM users
          JOIN doctors ON users.id = doctors.user_id
          WHERE users.role = 'doctor' AND doctors.id = '$id'";
        $result = DB::select($query);
        return $result;
    }
    
    public function getAvailableTimesForBooking($selectedDate, $Doctorid)
{
    $query = "SELECT list_time_doctor.id, list_time_doctor.time_start, list_time_doctor.time_end, list_time_doctor.price
    FROM list_time_doctor
    LEFT JOIN booking ON list_time_doctor.id = booking.time_id AND booking.date_booking = ? AND booking.doctor_id = ?
    WHERE booking.time_id IS NULL";
    
    $result = DB::select($query, [$selectedDate, $Doctorid]);
    return $result;
}
}
