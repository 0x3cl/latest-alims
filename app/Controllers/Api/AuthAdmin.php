<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AdminModel;
use CodeIgniter\Api\ResponseTrait;
use Firebase\JWT\JWT;
class AuthAdmin extends BaseController
{

    use ResponseTrait;
    
    public function login() {

        $rules = [
            'username' => ['rules' => 'required'],
            'password' => ['rules' => 'required'],
        ];

        if(!$this->validate($rules)) {
            $response = [
                'status' => 401,
                'message' => $this->validator->getErrors()
            ];
        } else {
            $username = $this->request->getVar('username');
            $password = $this->request->getVar('password');
            
            $model = new AdminModel;
            $model->where('username', $username);

            $data = $model->get()->getResult();;

            if($data != null || !empty($data)) {
                $user_id = $data[0]->id;
                $username = $data[0]->username;
                $password_db = $data[0]->password;

                $verifyPassword = password_verify($password, $password_db);

                if($verifyPassword) {
                    $key = getenv('JWT_SECRET');
                    $iat = time();
                    $exp = $iat + 3600;

                    $payload = array(
                        "iss" => "Issuer of the JWT",
                        "aud" => "Audience that the JWT",
                        "sub" => "Subject of the JWT",
                        "iat" => $iat, 
                        "exp" => $exp, 
                        "username" => $username,
                    );
                    $token = JWT::encode($payload, $key, 'HS256');
                    $session = [
                        'id' => $user_id,
                        'username' => $username,
                        'token' => $token
                    ];
                    session()->set(['user_session' => $session]);
                    $response = [
                        'status' => 200,
                        'message' => 'Login Success',
                        'token' => $token
                    ];
                } else {
                    $response = [
                        'status' => 401,
                        'message' => 'Invalid Username or Password',
                    ];
                }
            } else {
                $response = [
                    'status' => 401,
                    'message' => 'Invalid Username or Password',
                ];
            }

        }

        return $this->respond($response);
    }

    public function logout() {
        session()->remove('user_session');
        return redirect()->to('/admin/login');
    }

}
