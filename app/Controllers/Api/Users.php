<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\Api\UserModel;
use CodeIgniter\API\ResponseTrait;
use \Firebase\JWT\JWT;

class Users extends BaseController
{
    use ResponseTrait;

    protected $model;

    public function __construct() {
        $this->model = new UserModel;
    }

    public function index() {        
        $req = $this->request->getGet();
        if(empty($req)) {
            return $this->all();
        }

        if(array_key_exists('id', $req)) {
            return $this->filterByID($req['id']);
        }
    }

    public function all() {
        return $this->respond([
            'users' => $this->model->findAll()
        ], 200);    
    }

    public function filterByID($id) {
        return $this->respond([
            'users' => $this->model->find($id)
        ], 200);    
    }
}
