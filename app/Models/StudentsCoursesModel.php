<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentsCoursesModel extends Model
{
    protected $table = 'students_courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'course_id', 'semester', 'grade'];
}
