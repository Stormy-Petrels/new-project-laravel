<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Carbon;
use App\Models\Patient;

class AdminRepository
{
    // for doctors
    public function addNewDoctor(User $doctor)
    {
        $userSql = "INSERT INTO users (id, role, email, password, name, phone, address, url_image, created_at, updated_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $doctor = DB::insert($userSql, [
            $doctor->getId(),
            $doctor->getRole()->getValue(),
            $doctor->getEmail(),
            $doctor->getPassword(),
            $doctor->getFullName(),
            $doctor->getPhone(),
            $doctor->getAddress(),
            $doctor->getUrlImage(),
            Carbon::now(),
            Carbon::now()
        ]);
        return $doctor;
    }

    public function updateDoctor(User $user, Doctor $doctor)
    {
        $userSql = "UPDATE users
        SET name = ?, password = ?, phone = ?, address = ?, url_image = ?, email = ?, created_at = ?, updated_at = ? WHERE id = ?";

        $userSqldoctor = "UPDATE doctors SET specialization = ?, description = ? , created_at = ?, updated_at = ? WHERE user_id = ?";

        $userSql = DB::update($userSql, [
            $user->getFullName(),
            $user->getPassword(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage(),
            $user->getEmail(),
            Carbon::now(),
            Carbon::now(),
            $doctor->getUserId()
        ]);


        DB::update($userSqldoctor, [
            $doctor->getSpecialization(),
            $doctor->getDescription(),
            Carbon::now(),
            Carbon::now(),
            $doctor->getUserId(),
        ]);
        return $userSql;
    }

    public function deleteDoctor($id)
    {
        $userId = DB::table('doctors')->where('id', $id)->value('user_id');

        DB::table('doctors')->where('id', $id)->delete();
        DB::table('users')->where('id', $userId)->delete();
    }

    public function edit($id)
    {
    }


    public function add_new_user(User $user)
    {
        $user_sql = "INSERT INTO users (id, role, email, password, name, phone, address, url_image)VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $user = DB::insert($user_sql, [
            $user->getId(),
            $user->getRole()->getValue(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getFullName(),
            $user->getPhone(),
            $user->getAddress(),
            $user->getUrlImage()
        ]);

        return $user;
    }

    public function update_patient(User $user, Patient $patient)
    {
        $user_sql = "UPDATE users SET name = ?, password = ?, phone = ?, address = ? WHERE id = ?";
        $patient_sql = "UPDATE patients SET health_condition = ?, note = ?  WHERE user_id = ?";
         
        $user = DB::update($user_sql, [
            $user->getFullName(),
            $user->getPassword(),
            $user->getPhone(),
            $user->getAddress(),
            $patient->getUserId()
        ]);

        $patient= DB::update($patient_sql, [
            $patient->getHealthCondition(),
            $patient->getNote(),
            $patient->getUserId()
        ]);

        return $patient;
    }

    public function delete_patient($patientID)
    {
        // Lấy UserId từ bảng patients
        $userId = DB::table('patients')->where('id', $patientID)->value('user_id');

        // Xóa hàng trong bảng patients
        DB::table('patients')->where('id', $patientID)->delete();

        // Xóa hàng trong bảng users
        DB::table('users')->where('id', $userId)->delete();
    }

    public function get_appointments(){
        $appointments =  DB::table('booking')
        ->join('patients', 'booking.patient_id', '=', 'patients.id')
        ->join('doctors', 'booking.doctor_id', '=', 'doctors.id')
        ->join('users AS p', 'patients.user_id', '=', 'p.id')
        ->join('users AS d', 'doctors.user_id', '=', 'd.id')
        ->join('list_time_doctor AS ltd', 'booking.time_id', '=', 'ltd.id')
        ->select(
            'p.name AS patient_name',
            'p.phone AS patient_phone',
            'd.name AS doctor_name',
            'd.phone AS doctor_phone',
            'ltd.time_start AS time_start',
            'ltd.time_end AS time_end',
            'booking.date_booking AS date_booking',
            'patients.health_condition AS health_condition',
            'patients.note AS note'
        )
        ->get();
        return $appointments;
    }

    
}