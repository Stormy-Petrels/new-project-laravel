<?php

namespace App\Repositories;

use App\Models\Patient;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Reference\Reference;

class PatientRepository
{
    private string $tableName = "patients";

    public function add_new_patient(Patient $patient)
    {
        $sql = "INSERT INTO $this->tableName (id, user_id, health_condition, note) VALUES (?, ?, ?, ?)";
        DB::insert($sql, [
            $patient->getId(),
            $patient->getId(),
            $patient->getHealthCondition(),
            $patient->getNote()
        ]);
    }
     
    public function get_info_patients()
    {
        $sql = "SELECT u.url_image, u.name, u.email, u.phone, u.address, p.health_condition, p.note, p.user_id
        FROM $this->tableName p
        JOIN users u ON p.user_id = u.id;";
        return DB::select($sql); 
    }

    public function get_patient_by_id($id)
    {
        $sql = "SELECT p.user_id, u.name, u.email, u.password, u.phone, u.address, p.health_condition, p.note
                FROM patients p
                JOIN users u ON p.user_id = u.id
                WHERE p.user_id = :id";
        
        $patient = DB::select($sql, ['id' => $id]);
    
        return $patient;
    }

    public function delete_patient(string $userId): bool
{
    // Lấy ID bệnh nhân từ bảng patients
    $patientId = DB::table('patients')->where('user_id', $userId)->value('id');

    // Xóa hàng trong bảng patients
    DB::table('patients')->where('id', $patientId)->delete();

    // Xóa hàng trong bảng users
    DB::table('users')->where('id', $userId)->delete();

    return true; // Trả về true nếu xóa thành công
}

}