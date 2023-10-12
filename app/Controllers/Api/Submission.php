<?php

namespace App\Controllers\Api;
use CodeIgniter\Api\ResponseTrait;
use App\Controllers\BaseController;
use App\Models\SubmissionModel;
use App\Models\SubmissionFilesModel;
use App\Models\UserModel;

class Submission extends BaseController
{

    use ResponseTrait;

    public function checkSubmissionStatus() {
        $pid = $this->request->getGet('pid');
        $uid = $this->getCurrentUser()['id'];
        try {
            $model = new SubmissionModel;

            $submitted_data = [];

            $model->where('post_id', $pid);
            $model->where('user_id', $uid);
            $result_count = $model->countAllResults();
            

            if($result_count > 0) {
                $data = $model->find()[0];
                $pid = $data['post_id'];
                $subid = $data['id'];

                $submitted_data['content'] = $data['content'];
                $submitted_data['date_posted'] = $data['date_posted'];

                $model = new SubmissionFilesModel;
                $model->select('filename');
                $model->where('post_id', $pid);
                $model->where('submission_id', $subid);
                $result = $model->find();
                $submitted_data['files'] = $result;
            }

            return $this->respond([
                'status' => 200,
                'result_count' => $result_count,
                'data' => $submitted_data,
            ]);
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
    }
  
    public function submit_response() {
        $rules = [
            'content' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->respond([
                'status' => 500,
                'message' => $this->validator->getErrors()
            ]);
        } else {

            $pid = $this->request->getPost('pid');
            $content = $this->request->getPost('content');
            $files = $this->request->getFiles();

            $data = [
                'post_id' => $pid,
                'user_id' => $this->getCurrentUser()['id'],
                'content' => $content,
                'date_posted' => get_timestamp()
            ];

            try {

                $model = new SubmissionModel;

                if($model->insert($data)) {
                    $inserted_id = $model->insertID();
                    if(!empty($files) && array_key_exists('attachments', $files)) {
                        $files = $files['attachments'];
                        $path = './uploads/files/';
                        if(count($files) > 10) {
                            echo 'maximum of 10 files with maximum of 15mb each';
                        } else {
                            $model = new SubmissionFilesModel;
                            foreach($files as $file) {
                                if ($file->isValid()) {
                                    $fileSize = $file->getSize() / 1024;
                                    $filename = $file->getName();
                                    if($fileSize > 20000) {
                                        echo 'maximum of 10 files with maximum of 15mb each';
                                    } else {
                                        $data = [
                                            'post_id' => $pid,
                                            'submission_id' => $inserted_id,
                                            'filename' => $filename
                                        ];
                                        if($model->insert($data) && $file->move($path, $filename)) {
                                             $response = ([
                                                'status' => 200,
                                                'message' => 'response has been recorded',
                                                'pid' => $inserted_id
                                            ]);
                                        }
                                    }
                                } else {
                                    $response = ([
                                        'status' => 500,
                                        'message' => 'invalid file'
                                    ]);
                                }
                            }
                        }
                        return $this->respond([
                            'status' => 200,
                            'message' => 'response has been recorded',
                            'pid' => $inserted_id
                        ]);
                    } else {
                        return $this->respond([
                            'status' => 200,
                            'message' => 'response has been recorded',
                            'pid' => $inserted_id
                        ]);
                    }
                }

            } catch(\Exception $e) {
                return $this->respond([
                    'status' => 500,
                    'message' => 'error: ' . strtolower($this->$e->getMessage())
                ]);
            }

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
