<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AdminModel;

class ViewsController extends BaseController
{
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function discover() {
        $page = [
            'view' => 'discover',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Discover | Admin',
                'active' => 'discover',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function admins() {
        $page = [
            'view' => 'admin',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Administrators | Admin',
                'active' => 'accounts',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function create_enroll_user() {
        $page = [
            'view' => 'create-enroll-users',
            'dir' => 'Admin',
            'isSubPage' => true,
            'data' => [
                'title' => 'Enroll User | Admin',
                'active' => 'enroll',
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function courses() {
        $page = [
            'view' => 'courses',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Courses | Admin',
                'active' => 'class_course',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function subjects() {
        $page = [
            'view' => 'subjects',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Subjects | Admin',
                'active' => 'class_course',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function sections() {
        $page = [
            'view' => 'sections',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Sections | Admin',
                'active' => 'class_course',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function years() {
        $page = [
            'view' => 'years',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'All Years | Admin',
                'active' => 'class_course',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'title' => 'SMTP | System',
                'active' => 'system',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function backup() {
        $page = [
            'view' => 'backup',
            'dir' => 'Admin',
            'isSubPage' => false,
            'data' => [
                'title' => 'Backup | System',
                'active' => 'system',
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }
    
    

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new AdminModel;
        $model->select('
            id, firstname, lastname, contact, address, province, 
            city, birthday, status, gender, email, username, role,
            avatar, banner, bio, fb_link, ig_link, twi_link
        ');
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
