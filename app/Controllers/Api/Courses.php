<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\CourseModel;
use CodeIgniter\Api\ResponseTrait;
class Courses extends BaseController
{

    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new CourseModel;
    }

    public function getCourses($id = null) {
        if($id != null) {
            $this->model->where('id', $id);
        }

        $data = $this->model->findAll();


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

    public function create() {
        $rules = [
            'code' => ['required', 'is_unique[courses.code]'],
            'name' => ['required', 'is_unique[courses.name]'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {

            $code = $this->request->getPost('code');
            $name = $this->request->getPost('name');

            $data = [
                'code' => strtolower($code),
                'name' => strtolower($name),
                'date_updated' => get_timestamp(),
                'date_created' => get_timestamp(),
            ];

            try {
                if($this->model->insert($data)) {
                    $response = [
                        'status' => 200,
                        'message' => 'course ' . $name. ' created'
                    ];

                    return $this->respond($response);
                }
            } catch (\Exception $e) {
                $response = [
                    'status' => 500,
                    'message' => 'error: ' . strtolower($e->getMessage())
                ];

                return $this->respond($response);
            }

        }
    }

    public function update($id) {
        $rules = [
            'code' => ['required'],
            'name' => ['required'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {

            $code = $this->request->getPost('code');
            $name = $this->request->getPost('name');

            $data = [
                'code' => strtolower($code),
                'name' => strtolower($name),
                'date_updated' => get_timestamp()
            ];

            try {

                $isExists = $this->model->where("id", $id)->countAllResults();

                if($isExists > 0) {
                    if($this->model->where('id', $id)->set($data)->update()) {
                        $response = [
                            'status' => 200,
                            'message' => 'course ' . $name. ' updated'
                        ];
    
                        return $this->respond($response);
                    }
                } else {
                    $response = [
                        'status' => 404,
                        'message' => 'course #' . $id . ' does not exists'
                    ];

                    return $this->respond($response);
                }

            } catch (\Exception $e) {
                $response = [
                    'status' => 500,
                    'message' => 'error: ' . strtolower($e->getMessage())
                ];

                return $this->respond($response);
            }

        }
    }

}
