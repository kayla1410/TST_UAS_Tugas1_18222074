<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsModel extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'no';
    protected $allowedFields = ['id', 'nama', 'semester', 'nim', 'ip_sem1', 'ip_sem2', 'ip_sem3', 'ip_sem4', 'ip_sem5', 'ip_sem6', 'ip_sem7', 'ip_sem8', ];
}
