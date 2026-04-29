<?php

namespace App\Controllers;

use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index() {
        $model = new StudentModel();

        $data['students'] = $model->getListStudents();

        return view('students_list', $data);
    }
}