<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SmtpModel;
use CodeIgniter\Api\ResponseTrait;

class Smtp extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new SmtpModel;
    }

    public function getSmtp($id = null) {
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

    public function update() {
        $rules = [
            'server' => ['required'],
            'port' => ['required', 'integer'],
            'username' => ['required'],
            'password' => ['required'],
        ];
        
        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];

            return $this->respond($response);
        } else {

            $data = [
                'server' => $this->request->getPost('server'),
                'port' => $this->request->getPost('port'),
                'username' => $this->request->getPost('username'),
                'password' => $this->request->getPost('password'),
                'date_updated' => get_timestamp()
            ];

            try {
                if($this->model->where('id', 1)->set($data)->update()) {
                    $response = [
                        'status' => 200,
                        'message' => 'smtp updated'
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
