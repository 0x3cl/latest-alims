<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SubjectModel;
use CodeIgniter\Api\ResponseTrait;

class Subjects extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new SubjectModel;
    }

    public function getSubjects($id = null) {
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
            'code' => ['required', 'is_unique[subjects.code]'],
            'course' => ['required', 'integer'],
            'section' => ['required', 'integer'],
            'year' => ['required', 'integer'],
            'name' => ['required', 'is_unique[subjects.code]'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {
            
            $code = $this->request->getPost('code');
            $course = $this->request->getPost('course');
            $section = $this->request->getPost('section');
            $year = $this->request->getPost('year');
            $name = $this->request->getPost('name');
            $description = $this->request->getPost('description');

            $data = [
                'code' => strtolower($code),
                'course' => strtolower($course),
                'section' => strtolower($section),
                'year' => strtolower($year),
                'name' => strtolower($name),
                'description' => strtolower($description),
                'date_updated' => get_timestamp()
            ];

            try {
                if($this->model->insert($data)) {
                    $response = [
                        'status' => 200,
                        'message' => 'subject ' . $name . ' created'
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
            'course' => ['required', 'integer'],
            'section' => ['required', 'integer'],
            'year' => ['required', 'integer'],
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
            $course = $this->request->getPost('course');
            $section = $this->request->getPost('section');
            $year = $this->request->getPost('year');
            $name = $this->request->getPost('name');
            $description = $this->request->getPost('description');
    
            $data = [
                'code' => strtolower($code),
                'course' => strtolower($course),
                'section' => strtolower($section),
                'year' => strtolower($year),
                'name' => strtolower($name),
                'description' => strtolower($description),
                'date_updated' => get_timestamp()
            ];

            
            try {

                $isExists = $this->model->where("id", $id)->countAllResults();

                if($isExists > 0) {
                    if($this->model->where('id', $id)->set($data)->update()) {
                        $response = [
                            'status' => 200,
                            'message' => 'subject ' . $name. ' updated'
                        ];
    
                        return $this->respond($response);
                    }
                } else {
                    $response = [
                        'status' => 404,
                        'message' => 'subject #' . $id . ' does not exists'
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
