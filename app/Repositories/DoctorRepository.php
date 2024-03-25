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
}
