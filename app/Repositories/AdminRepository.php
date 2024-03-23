<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Carbon;

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

    public function updateDoctor(User $user, Doctor $doctor)
    {
        $userSql = "UPDATE users
        SET name = ?, password = ?, phone = ?, address = ?, url_image = ?, email = ? WHERE id = ?";

        $userSqldoctor = "UPDATE doctors SET specialization = ?, description = ? , created_at = ?, updated_at = ? WHERE user_id = ?";

        $userSql = DB::update($userSql, [
            $user->getFullName(),
            $user->getPassword(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage(),
            $user->getEmail(),
            $doctor->getUserId()
        ]);


        DB::update($userSqldoctor, [
            $doctor->getSpecialization(),
            $doctor->getDescription(),
            $doctor->getUserId(),
            Carbon::now(),
            Carbon::now()
        ]);
        return $userSql;
    }

    public function deleteDoctor($doctorId)
    {
        $userId = DB::table('doctors')->where('id', $doctorId)->value('user_id');

        DB::table('doctors')->where('id', $doctorId)->delete();
        DB::table('users')->where('id', $userId)->delete();
        return DB::table('user')->where('id', $doctorId);
    }

    public function edit($id)
    {
    }
}
