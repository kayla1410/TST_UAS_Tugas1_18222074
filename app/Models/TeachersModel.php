<?php

namespace App\Models;

use CodeIgniter\Model;

class TeachersModel extends Model
{
    protected $table = 'teacher';
    protected $primaryKey = 'no';
    protected $allowedFields = ['id', 'nama'];
}
