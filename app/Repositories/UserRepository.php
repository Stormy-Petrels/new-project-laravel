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

    public function findByEmail($email)
    {
        $result = DB::select("SELECT * FROM users
        WHERE email = ? LIMIT 1", [$email]);

        if (!empty($result)) {
            $newUser = $result[0];
            if ($newUser->role == "admin") {
                $role = Role::Admin;
            } elseif ($newUser->role == "doctor") {
                $role = Role::Doctor;
            } else {
                $role = Role::Patient;
            }
            return new User(
                $role,
                $newUser->email,
                $newUser->password,
                $newUser->name,
                $newUser->phone == null ? "" : $newUser->phone,
                $newUser->address == null ? "" : $newUser->address,
                $newUser->url_image == null ? "" : $newUser->url_image
            );
        }
        return null;
    }
}
