<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use App\Models\UserModel;
use App\Models\EnrolledModel;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\YearModel;
use App\Models\SectionModel;


use CodeIgniter\Api\ResponseTrait;

class Overview extends BaseController
{

    use ResponseTrait;

    public function index() {
       
        $admin_model = new AdminModel;
        $user_model = new UserModel;
        $enroll_model = new EnrolledModel;
        $course_model = new CourseModel;
        $subject_model = new SubjectModel;
        $year_model = new YearModel;
        $section_model = new SectionModel;

        $data = [
            'total_admins' => $admin_model->countAll(),
            'total_users' => $user_model->countAll(),
            'total_instructors' => $user_model->where('role', 1)
                                            ->countAllResults(),
            'total_students' => $user_model->where('role', 2)
                                            ->countAllResults(),
            'total_enrolled_instructors' => $enroll_model->join('users', 'users.id = enroll.user_id')
                                            ->where('users.role', 1)
                                            ->countAllResults(),
            'total_enrolled_students' => $enroll_model->join('users', 'users.id = enroll.user_id')
                                            ->where('role', 2)
                                            ->countAllResults(),
            'total_courses' => $course_model->countAll(),
            'total_subjects' => $subject_model->countAll(),
            'total_years' => $year_model->countAll(),
            'total_sections' => $section_model->countAll(),
        ];

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
