<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\PostModel;
use App\Models\AttachmentModel;
use App\Models\UserModel;
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

    public function getPostAttachments() {
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid');
        try {
            $model = new PostModel;
            $model->select('attachments.id, attachments.filename');
            $model->join('attachments', 'posts.id = attachments.post_id');
            $model->where('enroll_id', $eid);
            $model->where('subject_id', $sid);
            $model->where('posts.id', $pid);
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
            $is_submission = $this->request->getPost('is_submission');
            $restrict_submission = $this->request->getPost('restrict_submission');
            $date_submission = $this->request->getPost('date_submission');
            $time_submission = $this->request->getPost('time_submission');

            $files = $this->request->getFiles();

            if(!empty($date_avail || !empty($time_avail))) {
                $is_scheduled = 1;
            } else {
                $is_scheduled = 0;
            }

            if($is_submission == 1) {
                $rules = [
                    'restrict_submission' => 'required',
                    'date_submission' => 'required',
                    'time_submission' => 'required'
                ];
                if(!$this->validate($rules)) {
                    return $this->respond([
                        'status' => 500,
                        'message' => $this->validator->getErrors()
                    ]);
                } else {
                    $data = [
                        'enroll_id' => $eid,
                        'subject_id' => $sid,
                        'title' => $title,
                        'post_group' => $group,
                        'content' => $content,
                        'is_scheduled' => $is_scheduled,
                        'schedule' => strtotime($date_avail . ' ' . $time_avail),
                        'accept_submission' => $is_submission,
                        'restrict_submission' => $restrict_submission,
                        'date_submission' => strtotime($date_submission),
                        'time_submission' => $time_submission,
                        'date_posted' => get_timestamp()
                    ];
                }
            } else {
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
            }

            try {

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
                                    $filename = $file->getName();
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

    public function update() {
        $rules = [
            'title' => 'required',
            'group' => 'required',
            'content' => 'required',
            'pid' => 'required'
        ];

        if(!$this->validate($rules)) {
            return $this->respond([
                'status' => 500,
                'message' => $this->validator->getErrors()
            ]);
        } else {
            $pid = $this->request->getPost('pid');
            $title = $this->request->getPost('title');
            $group = $this->request->getPost('group');
            $content = $this->request->getPost('content');

            try {
                $data = [
                    'title' => $title,
                    'post_group' => $group,
                    'content' => $content,
                    'date_posted' => get_timestamp()
                ];

                $model = new PostModel;

                if($model->set($data)->where('id', $pid)->update()) {
                    return $this->respond([
                        'status' => 200,
                        'message' => 'post updated successfully!'
                    ]);
                }
                

            } catch(\Exception $e) {
                return $this->respond([
                    'status' => 500,
                    'message' => 'error: ' . strtolower($this->$e->getMessage())
                ]);
            }
        }
    }

    public function upload_attachment() {
        $pid = $this->request->getPost('pid');
        $files = $this->request->getFiles();
        if(count($files) > 0) {
            $files = $files['attachments'];
            $path = './uploads/files/';
            if(count($files) > 10) {
                echo 'maximum of 10 files with maximum of 15mb each';
            } else {
                foreach($files as $file) {
                    if ($file->isValid()) {
                        $fileSize = $file->getSize() / 1024;
                        $filename = $file->getName();
                        if($fileSize > 20000) {
                            echo 'maximum of 10 files with maximum of 15mb each';
                        } else {
                            $model = new AttachmentModel;
                            $data = [
                                'post_id' => $pid,
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
                'status' => 500,
                'message' => 'upload atleast one file'
            ]);
        }
    }

    public function delete_post() {
        $pid = $this->request->getPost('pid');
        $post_model = new PostModel;
        $attachment_model = new AttachmentModel;

        if($post_model->where('id', $pid)->delete()
            && $attachment_model->where('post_id', $pid)->delete()) {
            return $this->respond([
                'status' => 200,
                'message' => 'post deleted successfully'
            ]);
        } else {
            return $this->respond([
                'status' => 500,
                'message' => 'failed to delete post'
            ]);
        }

    }

    public function delete_attachment() {
        $aid = $this->request->getPost('aid');
        $uid = $this->getCurrentUser()['id'];
        $model = new AttachmentModel;
        $model->select('attachments.id, attachments.filename');
        $model->join('posts', 'attachments.post_id = posts.id');
        $model->join('enroll', 'posts.enroll_id = enroll.id');
        $model->where('attachments.id', $aid);
        $model->where('enroll.user_id', $uid);
        $result = $model->find();
       
        if(count($result) > 0) {
            if($model->where('id', $aid)->delete()
                && unlink('./uploads/files/'.$result[0]['filename'])) {
                return $this->respond([
                    'status' => 200,
                    'message' => 'file deleted'
                ]);
            }
        }
    }


    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new UserModel;
        $model->select('
            users.id, users.email, users.username, users.role, instructors.firstname, instructors.lastname, 
            instructors.contact, instructors.address, instructors.province, 
            instructors.city, instructors.birthday, instructors.status, instructors.gender, 
            instructors.avatar, instructors.banner, instructors.bio, instructors.fb_link, instructors.ig_link, instructors.twi_link
        ');
        $model->join('instructors', 'users.id = instructors.user_id');
        $data = $model->find($uid);
        return $data;
    }

}
