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
}
