<?php

namespace App\Controllers\Student;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\EnrolledModel;
use App\Models\PostModel;
use App\Models\SubmissionModel;
use App\Models\SubmissionFilesModel;


class ViewsController extends BaseController
{

    public function login() {
        $page = [
            'view' => 'login',
            'dir' => 'Student',
            'isSubPage' => false,
            'data' => [
                'title' => 'Student Login',
                'active' => '',
            ]
        ];

        return $this->renderView($page);
    }

    public function dashboard() {
        $page = [
            'view' => 'dashboard',
            'dir' => 'Student',
            'isSubPage' => false,
            'data' => [
                'title' => 'Dashboard | Student',
                'active' => 'dashboard',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function courses() {
        $page = [
            'view' => 'courses',
            'dir' => 'Student',
            'isSubPage' => false,
            'data' => [
                'title' => 'My Courses | Student',
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
                    'dir' => 'Student',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'Subjects | Student',
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
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid') ?? 1;

        try {
            $model = new EnrolledModel;
            $model->join('subjects', 'subjects.id = '.$sid);
            $model->where('enroll.id', $eid);
            // $model->where('user_id', $uid);

            $e_result = $model->find();

            if($e_result) {
                if(count($e_result) > 0) {
                    if(empty($pid)) {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $pid = $model->first()['id'] ?? '';
                    } else {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $model->where('id', $pid);
                        $result = $model->countAllResults();
    
                        if($result == 0) {
                            $pid = $model->first()['id'];
                        } else {
                            $pid = $pid;
                        }
                        
                    }

    
                    $page = [
                        'view' => 'view-posts',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                            
                    return $this->renderView($page);
                } else {
                    $page = [
                        'view' => 'view-posts',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                    
                    return $this->renderView($page);
                }
                
            } else {
                $page = [
                    'view' => 'view-posts',
                    'dir' => 'Student',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Posts | Student',
                        'active' => 'courses',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => [
                            'eid' => $eid,
                            'sid' => $sid,
                            'pid' => $pid,
                            'cid' => $e_result[0]['course_id'],
                            'yid' => $e_result[0]['year'],
                            'secid' => $e_result[0]['section'],
                        ]
                    ]
                ];
                
                return $this->renderView($page);

            }


        } catch(\Exception $e) {
            print_r($e->getMessage());
        }

       
    }

    public function subjects_submission() {
        $uid = $this->getCurrentUser()['id'];
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid');
 
        $subid = $this->request->getGet('submission');

        if(empty($subid) || !($subid)) {
            try {
                $model = new EnrolledModel;
                $model->join('subjects', 'subjects.id = '.$sid);
                $model->where('enroll.id', $eid);
                $model->where('user_id', $uid);
    
                $e_result = $model->find();
    
                if(!$e_result && count($e_result) > 0) {
                    
                    if(empty($pid)) {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $pid = $model->first()['id'] ?? '';
                    } else {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $model->where('id', $pid);
                        $result = $model->countAllResults();
    
                        if($result == 0) {
                            $pid = $model->first()['id'];
                        } else {
                            $pid = $pid;
                        }
                        
                    }
    
    
                    $page = [
                        'view' => 'view-submission-status',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                            
                    return $this->renderView($page);
                } else {
                    $page = [
                        'view' => 'view-submission-status',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                    
                    return $this->renderView($page);
                }
            } catch(\Exception $e) {
                print_r($e->getMessage());
            }
        } else {
            try {
                $model = new EnrolledModel;
                $model->join('subjects', 'subjects.id = '.$sid);
                $model->where('enroll.id', $eid);
                $model->where('user_id', $uid);
    
                $e_result = $model->find();
                if(count($e_result) > 0) {
                    if(empty($pid)) {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $pid = $model->first()['id'] ?? '';

                    } else {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $model->where('id', $pid);
                        $result = $model->countAllResults();
    
                        if($result == 0) {
                            $pid = $model->first()['id'];
                        } else {
                            $pid = $pid;
                        }
                    }

                    $model = new SubmissionModel;
                    $model->where('post_id', $pid);
                    $result = $model->find($subid);

                    if($result) {
                        $page = [
                            'view' => 'view-submission',
                            'dir' => 'Student',
                            'isSubPage' => true,
                            'data' => [
                                'title' => 'Posts | Student',
                                'active' => 'courses',
                                'current_userdata' => $this->getCurrentUser(),
                                'requested_data' => [
                                    'eid' => $eid,
                                    'sid' => $sid,
                                    'pid' => $pid,
                                    'cid' => $e_result[0]['course_id'],
                                    'yid' => $e_result[0]['year'],
                                    'secid' => $e_result[0]['section'],
                                    'subid' => $subid
                                ]
                            ]
                        ];

                        return $this->renderView($page);
                    } else {
                        return redirect()->to('/instructor/subjects/posts/submission?eid='.$eid.'&sid='.$sid.'&pid='.$pid);
                    }
                            
                }
            } catch(\Exeption $e) {
                print_r($e->getMessage());
            }
        }

    }

    public function add_submission() {
        $uid = $this->getCurrentUser()['id'];
        $eid = $this->request->getGet('eid');
        $sid = $this->request->getGet('sid');
        $pid = $this->request->getGet('pid');

    
        try {
            $model = new EnrolledModel;
            $model->join('subjects', 'subjects.id = '.$sid);
            $model->where('enroll.id', $eid);
            // $model->where('user_id', $uid);

            $e_result = $model->find();

            if($e_result) {
                if(count($e_result) > 0) {
                    if(empty($pid)) {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $pid = $model->first()['id'] ?? '';
                    } else {
                        $model = new PostModel;
                        $model->where('enroll_id', $eid);
                        $model->where('subject_id', $sid);
                        $model->where('id', $pid);
                        $result = $model->countAllResults();
    
                        if($result == 0) {
                            $pid = $model->first()['id'];
                        } else {
                            $pid = $pid;
                        }
                        
                    }
    
                    $page = [
                        'view' => 'add-submission',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                            
                    return $this->renderView($page);
                } else {
                    $page = [
                        'view' => 'view-posts',
                        'dir' => 'Student',
                        'isSubPage' => true,
                        'data' => [
                            'title' => 'Posts | Student',
                            'active' => 'courses',
                            'current_userdata' => $this->getCurrentUser(),
                            'requested_data' => [
                                'eid' => $eid,
                                'sid' => $sid,
                                'pid' => $pid,
                                'cid' => $e_result[0]['course_id'],
                                'yid' => $e_result[0]['year'],
                                'secid' => $e_result[0]['section'],
                            ]
                        ]
                    ];
                    
                    return $this->renderView($page);
                }
                
            } else {
                $page = [
                    'view' => 'view-posts',
                    'dir' => 'Student',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Posts | Student',
                        'active' => 'courses',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => [
                            'eid' => $eid,
                            'sid' => $sid,
                            'pid' => $pid,
                            'cid' => $e_result[0]['course_id'],
                            'yid' => $e_result[0]['year'],
                            'secid' => $e_result[0]['section'],
                        ]
                    ]
                ];
                
                return $this->renderView($page);

            }


        } catch(\Exception $e) {
            print_r($e->getMessage());
        }

       
    }

    public function masterlist() {

        $uid = $this->getCurrentUser()['id'];
        $cid = $this->request->getGet('course');
        $yid = $this->request->getGet('year');
        $sid = $this->request->getGet('section');
        

        $page = [
            'view' => 'masterlist',
            'dir' => 'Student',
            'isSubPage' => true,
            'data' => [
                'title' => 'Participants | Courses',
                'active' => 'courses',
                'current_userdata' => $this->getCurrentUser(),
                'requested_data' => [
                    'cid' => $cid,
                    'yid' => $yid,
                    'sid' => $sid,
                ]
            ]
        ];

        return $this->renderView($page);

       
    }

    public function me() {
        $page = [
            'view' => 'me',
            'dir' => 'Student',
            'isSubPage' => false,
            'data' => [
                'title' => 'My Profile | Settings',
                'active' => 'settings',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function change_password() {
        $page = [
            'view' => 'change-password',
            'dir' => 'Student',
            'isSubPage' => true,
            'data' => [
                'title' => 'Change Password | Settings',
                'active' => 'settings',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function signout() {
        session()->remove('user_session');
        return redirect()->to('/student/login');
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new UserModel;;
        $model->select('
            users.id, users.email, users.username, users.role, students.firstname, students.lastname, 
            students.contact, students.address, students.province, 
            students.city, students.birthday, students.status, students.gender, 
            students.avatar, students.banner, students.bio, students.fb_link, students.ig_link, students.twi_link
        ');
        $model->join('students', 'users.id = students.user_id');
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
