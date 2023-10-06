<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\EnrolledModel;
use App\Models\CourseModel;
use App\Models\SubjectModel;
use App\Models\SectionModel;
use App\Models\YearModel;

class ViewsController extends BaseController
{

    public function index() {
        if(session()->has('user_session')) {
            return redirect()->to('/admin/dashboard');
        } else {
            return redirect()->to('/admin/login');
        }
    }

    public function login() {
        $page = [
            'view' => 'login',
            'dir' => 'Admin',
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
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Dashboard | Admin',
                'active' => 'dashboard',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_bulk() {
        $page = [
            'view' => 'create-bulk',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Instructor Account | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function students() {
        $page = [
            'view' => 'students',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Students | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_students() {
        $page = [
            'view' => 'create-student',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Student Account | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function instructors() {
        $page = [
            'view' => 'instructors',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Instructors | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_instructors() {
        $page = [
            'view' => 'create-instructor',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Instructor Account | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function update_user($id) {

        if($this->isUserExists('user', $id)) {
            $page = [
                'view' => 'update-users',
                'dir' => 'Admin',
                'isSubPage' => true,
                'data' => [
                    'title' => 'Update User Accounts | Admin',
                    'active' => 'accounts',
                    'current_userdata' => $this->getCurrentUser(),
                    'requested_data' => $this->getUserByID('user', $id)
                ]
            ];
    
            return $this->renderView($page);
        } else {
            $page = [
                'view' => 'unauthorized',
                'dir' => 'Admin',
                'isSubPage' => false,
                'data' => [
                    'title' => 'User Notice | Admin',
                    'active' => '',
                    'current_userdata' => $this->getCurrentUser(),
                    'error' => [
                        'code' => 404,
                        'message' => 'not found'
                    ]
                ]
            ];
    
            return $this->renderView($page);
        }
        
    }

    public function admins() {

        $page = [
            'view' => 'admin',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Administrators | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_administrators() {
        $page = [
            'view' => 'create-admin',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Admin Account | Admin',
                'active' => 'accounts',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function enroll_students() {
        $page = [
            'view' => 'enroll-students',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Enrolled Students | Admin',
                'active' => 'enroll',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function enroll_instructors() {
        $page = [
            'view' => 'enroll-instructors',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Enrolled Instructors | Admin',
                'active' => 'enroll',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_enroll_user($id) {
        if($this->isUserExists('user', $id)) {
            $page = [
                'view' => 'create-enroll-users',
                'dir' => 'Admin',
                'isSubPage' => true,
                'data' => [
                    'title' => 'Enroll User | Admin',
                    'active' => 'enroll',
                    'current_userdata' => $this->getCurrentUser(),
                    'requested_data' => $this->getUserByID('user', $id)
                ]
            ];
    
            return $this->renderView($page);
        } else {
            $page = [
                'view' => 'unauthorized',
                'dir' => 'Admin',
                'isSubPage' => false,
                'data' => [
                    'title' => 'User Notice | Admin',
                    'active' => '',
                    'current_userdata' => $this->getCurrentUser(),
                    'error' => [
                        'code' => 404,
                        'message' => 'not found'
                    ]
                ]
            ];
    
            return $this->renderView($page);
        }
    }

    public function update_enroll_user($id) {

        try {
            $model = new EnrolledModel;
            $result = $model->where('id', $id)->countAllResults();
            
            if($result > 0 ) {
               
                $model->select('
                    enroll.id,
                    users.username, users.email,
                    IF(users.role = 1, instructors.firstname, students.firstname) as firstname,
                    IF(users.role = 1, instructors.lastname, students.lastname) as lastname,
                    courses.id as course_id, courses.name as course_name,
                    sections.id as section_id, sections.name as section_name,
                    years.id as year_id, years.name as year_name
                ');

                $model->join('courses', 'enroll.course_id = courses.id');
                $model->join('sections', 'enroll.section = sections.id');
                $model->join('users', 'enroll.user_id = users.id');
                $model->join('years', 'enroll.year = years.id');
                $model->join('instructors', 'enroll.user_id = instructors.user_id', 'LEFT');
                $model->join('students', 'enroll.user_id = students.user_id', 'LEFT');

                $data = $model->find($id);
                $page = [
                    'view' => 'update-enroll-user',
                    'dir' => 'Admin',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Update Section | Admin',
                        'active' => 'class_course',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => $data
                    ]
                ];
        
                return $this->renderView($page);

            } else {
                $page = [
                    'view' => 'unauthorized',
                    'dir' => 'Admin',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'User Notice | Admin',
                        'active' => '',
                        'current_userdata' => $this->getCurrentUser(),
                        'error' => [
                            'code' => 404,
                            'message' => 'not found'
                        ]
                    ]
                ];
        
                return $this->renderView($page);
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function courses() {
        $page = [
            'view' => 'courses',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Courses | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_course() {
        $page = [
            'view' => 'create-course',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Course | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function update_course($id) {

        try {
            $model = new CourseModel;

            $result = $model->where('id', $id)->countAllResults();
            
            if($result > 0 ) {
                $data = $model->find($id);
                $page = [
                    'view' => 'update-course',
                    'dir' => 'Admin',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Update Course | Admin',
                        'active' => 'class_course',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => $data
                    ]
                ];
        
                return $this->renderView($page);

            } else {
                $page = [
                    'view' => 'unauthorized',
                    'dir' => 'Admin',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'User Notice | Admin',
                        'active' => '',
                        'current_userdata' => $this->getCurrentUser(),
                        'error' => [
                            'code' => 404,
                            'message' => 'not found'
                        ]
                    ]
                ];
        
                return $this->renderView($page);
            }

           

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

        
    }

    public function subjects() {
        $page = [
            'view' => 'subjects',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Subjects | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_subject() {
        $page = [
            'view' => 'create-subject',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Subject | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function update_subject($id) {

        try {
            $model = new SubjectModel;

            $result = $model->where('id', $id)->countAllResults();
            
            if($result > 0 ) {
                 $model->select('subjects.id, subjects.code as subject_code, subjects.name as subject_name, subjects.description as subject_description, 
                            courses.id as course_id, courses.name as course_name, sections.id as section_id,
                            sections.name as section_name, years.id as year_id, years.name as year_name');
                $model->join('courses', 'subjects.course = courses.id');
                $model->join('sections', 'subjects.section = sections.id');
                $model->join('years', 'subjects.year = years.id');

                $data = $model->where('subjects.id', $id)->find()[0];
                
                $page = [
                    'view' => 'update-subject',
                    'dir' => 'Admin',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Update Subject | Admin',
                        'active' => 'class_course',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => $data
                    ]
                ];
        
                return $this->renderView($page);

            } else {
                $page = [
                    'view' => 'unauthorized',
                    'dir' => 'Admin',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'User Notice | Admin',
                        'active' => '',
                        'current_userdata' => $this->getCurrentUser(),
                        'error' => [
                            'code' => 404,
                            'message' => 'not found'
                        ]
                    ]
                ];
        
                return $this->renderView($page);
            }

           

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

        
    }

    public function sections() {
        $page = [
            'view' => 'sections',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Sections | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_section() {
        $page = [
            'view' => 'create-section',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Section | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function update_section($id) {

        try {
            $model = new SectionModel;

            $result = $model->where('id', $id)->countAllResults();
            
            if($result > 0 ) {
                $data = $model->find($id);
                $page = [
                    'view' => 'update-section',
                    'dir' => 'Admin',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Update Section | Admin',
                        'active' => 'class_course',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => $data
                    ]
                ];
        
                return $this->renderView($page);

            } else {
                $page = [
                    'view' => 'unauthorized',
                    'dir' => 'Admin',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'User Notice | Admin',
                        'active' => '',
                        'current_userdata' => $this->getCurrentUser(),
                        'error' => [
                            'code' => 404,
                            'message' => 'not found'
                        ]
                    ]
                ];
        
                return $this->renderView($page);
            }

           

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

        
    }

    public function years() {
        $page = [
            'view' => 'years',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Years | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_year() {
        $page = [
            'view' => 'create-year',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Create Year | Admin',
                'active' => 'class_course',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function update_year($id) {

        try {
            $model = new YearModel;

            $result = $model->where('id', $id)->countAllResults();
            
            if($result > 0 ) {
                $data = $model->find($id);
                $page = [
                    'view' => 'update-year',
                    'dir' => 'Admin',
                    'isSubPage' => true,
                    'data' => [
                        'title' => 'Update Year | Admin',
                        'active' => 'class_course',
                        'current_userdata' => $this->getCurrentUser(),
                        'requested_data' => $data
                    ]
                ];
        
                return $this->renderView($page);

            } else {
                $page = [
                    'view' => 'unauthorized',
                    'dir' => 'Admin',
                    'isSubPage' => false,
                    'data' => [
                        'title' => 'User Notice | Admin',
                        'active' => '',
                        'current_userdata' => $this->getCurrentUser(),
                        'error' => [
                            'code' => 404,
                            'message' => 'not found'
                        ]
                    ]
                ];
        
                return $this->renderView($page);
            }

           

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }


    public function filemanager() {

        $filemanagerController = new FileManagerController();

        $page = [
            'view' => 'filemanager',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'SMTP | System',
                'active' => 'system',
                'current_userdata' => $this->getCurrentUser(),
                'requested_data' => [
                    'current_path' => $current_path = request()->getGet('open'),
                    'display' => $filemanagerController->openFolder()
                ]
            ]
        ];

        return $this->renderView($page);
    }

    public function smtp() {
        $page = [
            'view' => 'smtp',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'File Manager | System',
                'active' => 'system',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function reports() {
        $page = [
            'view' => 'reports',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Reports | System',
                'active' => 'system',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function backup() {

        $path = ROOTPATH . '/public/uploads/logs/administrators';
        $logs = scandir($path);
        $logs = array_filter($logs, function($item) {
            return $item !== '.' && $item !== '..';
        });

        rsort($logs);

        $page = [
            'view' => 'backup',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Backup | System',
                'active' => 'system',
                'current_userdata' => $this->getCurrentUser(),
                'requested_data' => [
                    'logs' =>  $logs
                ]
            ]
        ];

        return $this->renderView($page);
    }

     public function me() {
        $page = [
            'view' => 'me',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'My Profile | Settings',
                'active' => 'settings',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function passwords() {
        $page = [
            'view' => 'change-password',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Change Password | Settings',
                'active' => 'settings',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }
    
    public function getUserByID($role, $id) {

        if($role === $role) {
            $model = new UserModel();
        } else if($role === 'admin') {
            $model = new AdminModel();
        }

        $user_table = $this->getUserTable($id);

        try {
            $model->select('
                users.id, is_enrolled, firstname, lastname, contact, address, province, 
                city, birthday, status, gender, email, username, role,
                avatar, banner, bio, fb_link, ig_link, twi_link
            ');
            $model->join($user_table, 'users.id = '. $user_table . '.user_id');
            $data = $model->find($id);
            return $data;
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }

    }
    
    public function getUserTable($id) {
        $model = new UserModel();
        try {
            $result = $model->find($id)['role'];
            
            if($result == 1) {
                return 'instructors';
            } else if($result == 2) {
                return 'students';
            }

        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function isUserExists($role, $id) {
        
        if($role === 'user') {
            $model = new UserModel();
        } else if($role === 'admin') {
            $model = new AdminModel();
        }
        
        try {
            $result = $model->where('id', $id)->countAllResults();
            if($result > 0) {
                return true;
            } else {
                return false;
            }
        } catch (\Exception $e) {
            print_r($e->getMessage());
        }
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new AdminModel;
        try {
            $model->select('
                id, firstname, lastname, contact, address, province, 
                city, birthday, status, gender, email, username, role,
                avatar, banner, bio, fb_link, ig_link, twi_link
            ');
            $data = $model->find($uid);
            return $data;
        } catch(\Exception $e) {
            print_r($e->getMessage());
        }
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
