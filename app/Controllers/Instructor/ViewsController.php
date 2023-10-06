<?php

namespace App\Controllers\Instructor;

use App\Controllers\BaseController;
use App\Models\UserModel;

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
                'title' => 'Dashboard | Admin',
                'active' => 'dashboard',
                'current_userdata' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
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
