<?php

namespace App\Controllers\Admin;

use App\Models\CoursesModel;
use CodeIgniter\Controller;

class EditCourseController extends Controller
{
    public function index()
    {
        $model = new CoursesModel();
        
        $data['courses'] = $model->findAll();

        return view('courses/index', $data);
    }

    public function create()
    {
        $model = new CoursesModel();

        $credits = $this->request->getPost('credits');
        $duration = $credits * 50; // 1 SKS = 50 menit

        $data = [
            'course_name' => $this->request->getPost('course_name'),
            'credits' => $credits,
            'day' => $this->request->getPost('day'),
            'start_time' => $this->request->getPost('start_time'),
            'duration' => $duration,
        ];

        $model->save($data);

        return redirect()->to('/admin/courses');
    }

    public function delete($id)
    {
        $model = new CoursesModel();
        $model->delete($id);

        return redirect()->to('/admin/courses');
    }
}