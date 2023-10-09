<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PostGroupModel;
use CodeIgniter\Api\ResponseTrait;

class PostGroup extends BaseController
{

    use ResponseTrait;

    public function getPostGroup() {
        try {
            $model = new PostGroupModel;
            $data = $model->findAll();
            
            return$this->respond([
                'status' => 200,
                'data' => $data
            ]);
            
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
    }

}
