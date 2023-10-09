<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\AttachmentModel;
use CodeIgniter\Api\ResponseTrait;

class Post extends BaseController
{

    use ResponseTrait;

    public function getPost() {
        
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid');
        
        try {
            $model = new PostModel;
            $model->select('posts.*, post_group.name as group');
            $model->join('post_group', 'posts.post_group = post_group.id');
            $model->where('posts.id', $pid);
            $model->where('enroll_id', $eid);
            $model->where('subject_id', $sid);
            $data = $model->find($pid);

            return$this->respond([
                'status' => 200,
                'data' => $data
            ]);
            
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function getPostAll() {
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        
        try {
            $model = new PostModel;
            $model->select('posts.id,  posts.title, post_group.name as group');
            $model->join('post_group', 'posts.post_group = post_group.id');
            $model->where('enroll_id', $eid);
            $model->where('subject_id', $sid);
            $data = $model->find();

            return$this->respond([
                'status' => 200,
                'data' => $data
            ]);
            
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function create() {
        $rules = [
            'title' => 'required',
            'group' => 'required',
            'content' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->respond([
                'status' => 500,
                'message' => $this->validator->getErrors()
            ]);
        } else {
            $eid = $this->request->getPost('eid');
            $sid = $this->request->getPost('sid');
            $title = $this->request->getPost('title');
            $group = $this->request->getPost('group');
            $content = $this->request->getPost('content');
            $date_avail = $this->request->getPost('date_avail');
            $time_avail = $this->request->getPost('time_avail');
            $is_scheduled;
            $files = $this->request->getFiles();

            if(!empty($date_avail || !empty($time_avail))) {
                $is_scheduled = 1;
            } else {
                $is_scheduled = 0;
            }

            try {
                $data = [
                    'enroll_id' => $eid,
                    'subject_id' => $sid,
                    'title' => $title,
                    'post_group' => $group,
                    'content' => $content,
                    'is_scheduled' => $is_scheduled,
                    'schedule' => strtotime($date_avail . ' ' . $time_avail),
                    'date_posted' => get_timestamp()
                ];

                $model = new PostModel;

                if($model->insert($data)) {
                    $inserted_id = $model->insertID();
                    if(!empty($files) && array_key_exists('attachments', $files)) {
                        $files = $files['attachments'];
                        $path = './uploads/files/';
                        if(count($files) > 10) {
                            echo 'maximum of 10 files with maximum of 15mb each';
                        } else {
                            foreach($files as $file) {
                                if ($file->isValid()) {
                                    $fileSize = $file->getSize() / 1024;
                                    $filename = $file->getRandomName();
                                    if($fileSize > 20000) {
                                        echo 'maximum of 10 files with maximum of 15mb each';
                                    } else {
                                        $model = new AttachmentModel;
                                        $data = [
                                            'post_id' => $inserted_id,
                                            'filename' => $filename
                                        ];
                                        if($model->insert($data) && $file->move($path, $filename)) {
                                            return $this->respond([
                                                'status' => 200,
                                                'message' => 'posted successfully!'
                                            ]);
                                        }
                                    }
                                } else {
                                    return $this->respond([
                                        'status' => 500,
                                        'message' => 'invalid file'
                                    ]);
                                }
                            }
                        }
                    
                    } else {
                        return $this->respond([
                            'status' => 200,
                            'message' => 'posted successfully!'
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
}
