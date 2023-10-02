<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use CodeIgniter\API\ResponseTrait;

class Users extends BaseController
{
    use ResponseTrait;

    protected $user_model;

    public function __construct() {
        $this->user_model = new UserModel;
        $this->admin_model = new AdminModel;
    }

    public function getUsers($id = null) {

        if($id != null) {
            $this->user_model->where('id', $id);
        }

        $data = $this->user_model->findAll();


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

    public function getStudents($id = null) {
        $this->user_model->select('
            users.*,
            students.firstname, students.lastname,
            students.contact, students.address,
            students.province, students.city,
            students.birthday, students.status,
            students.gender, students.avatar,
            students.banner, students.bio,
            students.fb_link, students.ig_link,
            students.twi_link
            
        ');
        $this->user_model->join('students', 'users.id = students.user_id');

        if($id != null) {
            $this->user_model->where('users.id', $id);
        }

        $this->user_model->where('role', 2);


        $data = $this->user_model->get()->getResult();

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

    public function getInstructors($id = null) {
        $this->user_model->select('
            users.*,
            instructors.firstname, instructors.lastname,
            instructors.contact, instructors.address,
            instructors.province, instructors.city,
            instructors.birthday, instructors.status,
            instructors.gender, instructors.avatar,
            instructors.banner, instructors.bio,
            instructors.fb_link, instructors.ig_link,
            instructors.twi_link
            
        ');
        $this->user_model->join('instructors', 'users.id = instructors.user_id');

        if($id != null) {
            $this->user_model->where('users.id', $id);
        }

        $this->user_model->where('role', 1);

        $data = $this->user_model->get()->getResult();

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

    public function getAdmins($id = null) {
        $data = $this->admin_model->findAll();

        if($id != null) {
            $this->admin_model->where('id', $id);
        }

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
