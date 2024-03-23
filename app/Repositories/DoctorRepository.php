<?php

namespace App\Repositories;

use App\Models\Doctor;
use Illuminate\Support\Facades\DB;

class DoctorRepository
{
    private string $tableName = "doctors";

    public function insert_doctor(Doctor $doctor)
    {
        $sql = "INSERT INTO $this->tableName (id, user_id, specialization, description) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [
            $doctor->getId(),
            $doctor->getId(),
            $doctor->specialization,
            $doctor->description

        ]);
    }


    public function getAllTimeDoctor()
    {
    }

    public function getAllDoctor()
    {
        return DB::table('users')->where('role', 'doctor')->get();
    }

    public function getDoctorById(string $id)
    {
    }
}
