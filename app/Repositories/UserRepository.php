<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UserRepository
{
    private string $tableName = "users";


    public function insert(User $user)
    {
        $sql = "INSERT INTO $this->tableName (id, role, name, email, password, address, phone, , created_at, updated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        DB::insert($sql, [
            $user->getId(),
            $user->getRole()->getValue(),
            $user->getFullname(),
            $user->getEmail(),
            $user->getPassword(),
            $user->getAddress(),
            $user->getPhone(),
            Carbon::now(),
            Carbon::now()
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
