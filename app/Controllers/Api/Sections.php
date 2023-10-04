<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use CodeIgniter\Api\ResponseTrait;

class Sections extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new SectionModel;
    }

    public function getSections($id = null) {
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
            'name' => ['required', 'is_unique[sections.name]'],
        ];
    
        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {

            $name = $this->request->getPost('name');

            $data = [
                'name' => strtolower($name),
                'date_updated' => get_timestamp(),
                'date_created' => get_timestamp(),
            ];
    
            try {
                if($this->model->insert($data)) {
                    $response = [
                        'status' => 200,
                        'message' => 'section ' . $name . ' created'
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
            'name' => ['required'],
        ];
    
        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {

            $name = $this->request->getPost('name');

            $data = [
                'name' => strtolower($name),
                'date_updated' => get_timestamp(),
            ];

            try {

                $isExists = $this->model->where("id", $id)->countAllResults();

                if($isExists > 0) {
                    if($this->model->where('id', $id)->set($data)->update()) {
                        $response = [
                            'status' => 200,
                            'message' => 'section ' . $name. ' updated'
                        ];
    
                        return $this->respond($response);
                    }
                } else {
                    $response = [
                        'status' => 404,
                        'message' => 'section #' . $id . ' does not exists'
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
