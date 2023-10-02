<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SectionModel;
use CodeIgniter\Api\ResponseTrait;

class Section extends BaseController
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
}
