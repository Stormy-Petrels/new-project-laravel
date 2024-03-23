<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    private string $tableName = "users";


    public function insert(User $user)
    {
        $sql = "INSERT INTO $this->tableName (id, role, name, email, password, address, phone) VALUES (?, ?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [
            $user->getId(),
            $user->getRole()->getValue(),
            $user->getFullname(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAddress(),
            $user->getPhone()
        ]);
    }
    public function selectAll()
    {
    }

    public function update(User $model)
    {
    }

    public function delete(string $id)
    {
    }

}