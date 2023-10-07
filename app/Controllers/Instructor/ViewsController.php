<?php

namespace App\Controllers\Instructor;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EnrolledModel;

class ViewsController extends BaseController
{

    public function login() {
        $page = [
            'view' => 'login',
            'dir' => 'Instructor',
            'isSubPage' => false,
            'data' => [
                'title' => 'Admin Login',
                'active' => '',
            ]
        ];

        return $this->renderView($page);
    }

    public function dashboard() {
        $page = [
            'view' => 'dashboard',
            'dir' => 'Instructor',
            'isSubPage' => false,
            'data' => [
                'title' => 'Dashboard | Instructor',
                'active' => 'dashboard',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function courses() {
        $page = [
            'view' => 'courses',
            'dir' => 'Instructor',
            'isSubPage' => false,
            'data' => [
                'title' => 'My Courses | Instructor',
                'active' => 'courses',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function subjects() {
        $uid = $this->getCurrentUser()['id'];
        $course_id = $this->request->getGet('course');
        $year_id = $this->request->getGet('year');
        $section_id = $this->request->getGet('section');

        try {
            $model = new EnrolledModel;
            $model->where('user_id', $uid);
            $model->where('course_id', $course_id);
            $model->where('year', $year_id);
            $model->where('section', $section_id);

            $result = $model->find();

            if(count($result) > 0) {
                // proceed
                $page = [
                    'view' => 'subjects',
                    'dir' => 'Instructor',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'Subjects | Instructor',
                        'active' => 'courses',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => [
                            'param_ids' => [
                                'course_id' => $course_id,
                                'year_id' => $year_id,
                                'section_id' => $section_id
                            ]
                        ]
                    ]
                ];
                        
                return $this->renderView($page);
            } else {
                // 404
            }


        } catch(\Exception $e) {
            print_r($e->getMessage());
        }

       
    }

    public function subjects_posts() {
        $uid = $this->getCurrentUser()['id'];
        $eid = $this->request->getGet('eid');
        $subj_id = $this->request->getGet('subj_id');

        try {
            $model = new EnrolledModel;
            $model->join('subjects', 'subjects.id = '.$subj_id);
            $model->where('enroll.id', $eid);
            $model->where('user_id', $uid);

            $result = $model->find();

            if(count($result) > 0) {
                // proceed
                $page = [
                    'view' => 'view-posts',
                    'dir' => 'Instructor',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Posts | Instructor',
                        'active' => 'courses',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => [
                            'subject_id' => $result[0]['id']
                        ]
                    ]
                ];
                        
                return $this->renderView($page);
            } else {
                // 404
            }


        } catch(\Exception $e) {
            print_r($e->getMessage());
        }

       
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new UserModel;;
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

    public function renderView($page) {
        $view = $page['view'];
        $dir = $page['dir'];
        $isSubPage = $page['isSubPage'];
        $data = $page['data'];
        $templates = $dir . '\templates\\';

        if($isSubPage) {
            $path = '\\Views\\' . $dir . '\\sub-pages\\' . $view;
            $file_path = APPPATH . $path . '.php';
            if(file_exists($file_path)) {
                $view_path = 'App' . $path;
                return view('App\Views\\' . $templates . 'header', $data)
                . view($view_path)
                . view('App\Views\\' . $templates . 'footer');
                
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            $path = '\\Views\\' . $dir . '\\' . $view;
            $file_path = APPPATH . $path . '.php';
            if(file_exists($file_path)) {
                $view_path = 'App' . $path;
                return view('App\Views\\' . $templates . 'header', $data)
                . view($view_path)
                . view('App\Views\\' . $templates . 'footer');
                
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        }

    }


}
