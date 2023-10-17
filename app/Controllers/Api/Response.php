<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\ResponseModel;
use App\Models\PostModel;
use App\Models\UserModel;
use CodeIgniter\Api\ResponseTrait;
class Response extends BaseController
{

    use ResponseTrait;

    public function submit() {
        $data = $this->request->getPost('data');
        foreach ($data as &$item) {
            if (empty($item['response'])) {
                return $this->respond([
                    'status' => 500,
                    'message' => 'all questions must be answered.',
                ]);
            } else {
                $item['user_id'] = $this->getCurrentUser()['id'];
                $item['date_posted'] = get_timestamp();
            }
        }

        print_r($data);

        
        try {
            $response_model = new ResponseModel;
            $post_model = new PostModel;
            $responseInserted = $response_model->insertBatch($data);

            if ($responseInserted) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'response recorded',
                ]);
            }

        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
        
    
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $table = $user_session['role'] == 1 ? 'instructors' : ($user_session['role'] == 2 ? 'students' : '');
        $uid = $user_session['id'];
        $model = new UserModel;
        $model->select('
            users.id, users.email, users.username, users.role, '.$table.'.firstname, '.$table.'.lastname, 
            '.$table.'.contact, '.$table.'.address, '.$table.'.province, 
            '.$table.'.city, '.$table.'.birthday, '.$table.'.status, '.$table.'.gender, 
            '.$table.'.avatar, '.$table.'.banner, '.$table.'.bio, '.$table.'.fb_link, '.$table.'.ig_link, '.$table.'.twi_link
        ');
        $model->join(''.$table.'', 'users.id = '.$table.'.user_id');
        $data = $model->find($uid);
        return $data;
    }

}
