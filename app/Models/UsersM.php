<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersM extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'id_users';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['name', 'images', 'email', 'password', 'id_role', 'is_active', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }
    protected function beforeUpdate(array $data)
    {
        $data = $this->passwordHash($data);

        return $data;
    }
    protected function passwordHash(array $data)
    {
        if (isset($data['data']['password']))
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

    public function reset(array $data, $username)
    {
        $data = $this->where->get($data, $username);
    }
}
