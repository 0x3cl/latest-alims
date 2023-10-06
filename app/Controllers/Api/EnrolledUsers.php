<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\EnrolledModel;
use CodeIgniter\API\ResponseTrait;

class EnrolledUsers extends BaseController
{

    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new EnrolledModel;
    }

    public function getEnrolledStudents($id = null) {
        $this->model->select('
            enroll.id, users.username, users.role, users.email, students.firstname, students.lastname,
            courses.code as course_code, courses.name as course_name,
            sections.name as section_name, years.name as year_name
        ');
        $this->model->join('users', 'enroll.user_id = users.id');
        $this->model->join('students', 'enroll.user_id = students.user_id');
        $this->model->join('courses', 'enroll.course_id = courses.id');
        $this->model->join('years', 'enroll.year = years.id');
        $this->model->join('sections', 'enroll.section = sections.id');

        if($id != null) {
            $this->model->where('enroll.id', $id);
        }

        $data = $this->model->get()->getResult();

        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }

    public function getEnrolledInstructors($id = null) {
        $this->model->select('
            enroll.id, users.username, users.email, instructors.firstname, instructors.lastname,
            courses.code as course_code, courses.name as course_name,
            sections.name as section_name, years.name as year_name
        ');
        $this->model->join('users', 'enroll.user_id = users.id');
        $this->model->join('instructors', 'enroll.user_id = instructors.user_id');
        $this->model->join('courses', 'enroll.course_id = courses.id');
        $this->model->join('years', 'enroll.year = years.id');
        $this->model->join('sections', 'enroll.section = sections.id');

        if($id != null) {
            $this->model->where('enroll.id', $id);
        }

        $data = $this->model->get()->getResult();
     
        if($data != null || !empty($data)) {
            $response = [
                'status' => 200,
                'message' => 'ok',
                'data' => $data
            ];
        } else {
            $response = [
                'status' => 200,
                'message' => [],
            ];
        }
        return $this->respond($response, $response['status']);
    }
}
