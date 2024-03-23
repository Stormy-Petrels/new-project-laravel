<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;

class AdminRepository
{
    // for doctors
    public function addNewDoctor(User $doctor)
    {
        $userSql = "INSERT INTO users (id, role, email, password, name, phone, address, url_image)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $doctor = DB::insert($userSql, [
            $doctor->getId(),
            $doctor->getRole()->getValue(),
            $doctor->getEmail(),
            $doctor->getPassword(),
            $doctor->getFullName(),
            $doctor->getPhone(),
            $doctor->getAddress(),
            $doctor->getUrlImage()
        ]);
        return $doctor;
    }

    public function edit($id)
    {

    }
}