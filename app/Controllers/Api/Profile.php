<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use CodeIgniter\Api\ResponseTrait;
use App\Models\UserModel;
use App\Models\AdminModel;

class Profile extends BaseController
{

    use ResponseTrait;

    protected $model;
    protected $uid;

    public function __construct() {

        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $role = $user_session['role'];

        $this->uid = $uid;

        switch($role) {
            case 1 :
            case 2 :
                $this->model = new UserModel();
                break;
            case 3:
                $this->model = new AdminModel();
                break;
        }
    }

    public function update_info() {

        $rules = [
            'firstname' => ['required'],
            'lastname' => ['required'],
            'email' => ['required', 'valid_email'],
            'contact' => ['required', 'min_length[11]', 'max_length[11]'],
            'address' => ['required'],
            'status' => ['required'],
            'birthday' => ['required'],
            'gender' => ['required'],
        ];
        
        
        if(!$this->validate($rules)) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors(),
            ];
            return $this->respond($response);
        } else {
            $firstname = $this->request->getPost('firstname');
            $lastname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $contact = $this->request->getPost('contact');
            $birthday = $this->request->getPost('birthday');
            $address = $this->request->getPost('address');
            $gender = $this->request->getPost('gender');
            $status = $this->request->getPost('status');
            $state = $this->request->getPost('state');
            $city = $this->request->getPost('city');
            $fb_link = $this->request->getPost('fb_link');
            $ig_link = $this->request->getPost('ig_link');
            $twi_link = $this->request->getPost('twi_link');

            if(empty($state) || empty($city)) {
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'contact' => $contact,
                    'birthday' => $birthday,
                    'address' => $address,
                    'gender' => $gender,
                    'status' => $status,
                    'fb_link' => $fb_link,
                    'ig_link' => $ig_link,
                    'twi_link' => $twi_link
                ];

                if($this->model->where('id', $this->uid)->set($data)->update()) {
                    $response = [
                        'status' => 200,
                        'message' => 'profile info updated'
                    ];

                    return $this->respond($response);
                }
            } else {
                $data = [
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'contact' => $contact,
                    'birthday' => $birthday,
                    'address' => $address,
                    'gender' => $gender,
                    'status' => $status,
                    'province' => $state,
                    'city' => $city,
                    'fb_link' => $fb_link,
                    'ig_link' => $ig_link,
                    'twi_link' => $twi_link
                ];

                if($this->model->where('id', $this->uid)->set($data)->update()) {
                    $response = [
                        'status' => 200,
                        'message' => 'profile info updated'
                    ];

                    return $this->respond($response);
                }
            }
        }
        
    }

    public function update_bio() {
        $bio = $this->request->getPost('bio');
        try {
            if($this->model->where('id', $this->uid)->set([
                'bio' => $bio
            ])->update()) {
                $response = [
                    'status' => 200,
                    'message' => 'bio updated'
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

    public function update_avatar() {
        $image_path = './uploads/avatar/';
        $file = $this->request->getFile('file');

        $previous_image = $this->model->where('id', $this->uid)->find()[0]['avatar'];
        $previous_image_path = $image_path . $previous_image;

        try {
            if($previous_image != 'male-default.jpg' || $previous_image != 'female-default.jpg' && file_exists($previous_image_path)) {
                if(file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
    
            if($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                if($this->model->where('id', $this->uid)->set([
                    'avatar' => $filename
                ])->update()
                    && optimizeImageUpload($image_path, $file, $filename)) {
                    $response = [
                        'status' => 200,
                        'message' => 'profile avatar updated successfully'
                    ];
    
                    return $this->respond($response);
                }
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];

            return $this->respond($response);
        }
    }

    public function update_banner() {
        $image_path = './uploads/banner/';
        $file = $this->request->getFile('file');

        $previous_image = $this->model->where('id', $this->uid)->find()[0]['banner'];
        $previous_image_path = $image_path . $previous_image;

        try {
            if($previous_image != 'male-default.jpg' || $previous_image != 'female-default.jpg' && file_exists($previous_image_path)) {
                if(file_exists($previous_image_path)) {
                    unlink($previous_image_path);
                }
            }
    
            if($file->isValid() && !$file->hasMoved()) {
                $filename = $file->getRandomName();
                if($this->model->where('id', $this->uid)->set([
                    'banner' => $filename
                ])->update()
                    && optimizeImageUpload($image_path, $file, $filename)) {
                    $response = [
                        'status' => 200,
                        'message' => 'profile banner updated successfully'
                    ];
    
                    return $this->respond($response);
                }
            }
        } catch (\Exception $e) {
            $response = [
                'status' => 500,
                'message' => 'error: ' . strtolower($e->getMessage())
            ];

            return $this->respond($response);
        }
    }

    public function update_password() {
        $rules = [
            'old_password' => 'required',
            'new_password' => 'required|min_length[8]',
            'password_repeat' => 'required|min_length[8]|matches[new_password]',
        ];

        if(!($this->validate($rules))) {
            $response = [
                'status' => 500,
                'message' => $this->validator->getErrors()
            ];

            return $this->respond($response);
        } else {
            $old_password = $this->request->getPost('old_password');
            $new_password = $this->request->getPost('new_password');
            $password_repeat = $this->request->getPost('password_repeat');

            try {
                $data = $this->model->where('id', $this->uid)->find();
                $password_db = $data[0]['password'];

                if(count($data) > 0 && !empty($data)) {
                    if(password_verify($old_password, $password_db)) {
                        $data = [
                            'password' => password_hash($password_repeat, PASSWORD_BCRYPT)
                        ];

                        if($this->model->where('id', $this->uid)
                            ->set($data)->update()) {
                            $response = [
                                'status' => 200,
                                'message' => 'password changed successfully'
                            ];

                            return $this->respond($response);
                        }
                    } else {
                        $response = [
                            'status' => 500,
                            'message' => 'old password is incorrect'
                        ];

                        return $this->respond($response);
                    }
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
