<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Api\ResponseTrait;

class Token extends BaseController
{

    use ResponseTrait;

    public function generate_jwt() {
        $user_session = session()->get('user_session');
        if($user_session == null || empty($user_session)) {
            $response = [
                'status' => 401,
                'message' => 'unauthorized access'
            ];
            return $this->respond($response);
        } else {
            $jwt_token = $user_session['token'];
            $response = [
                'status' => 200,
                'token' => $jwt_token
            ];

            return $this->respond($response);
        }
    }

    public function generate_csrf() {
        $csrf_token = csrf_hash();
        $response = [
            'status' => 200,
            'token' => $csrf_token
        ];
        
        return $this->respond($response);
    }
}
