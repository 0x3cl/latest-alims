<?php

namespace App\Controllers\Api;
use CodeIgniter\Api\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\AssessmentResponses;
use App\Models\UserModel;

class Assessment extends BaseController
{

    use ResponseTrait;

    public function checkAssessmentStatus() {
        $pid = $this->request->getGet('pid');
        $uid = $this->getCurrentUser()['id'];
        try {
            $model = new AssessmentResponses;
            $model->where('post_id', $pid);
            $model->where('user_id', $uid);
            $result = $model->countAllResults();
            return $this->respond(
                [
                    'status' => 200,
                    'data' => $result,
                ]
            );
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
