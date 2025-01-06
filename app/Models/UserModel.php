<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'no';
    protected $allowedFields = ['id', 'username', 'password', 'role'];
}