<?php

namespace App\Controllers\Instructor;

use App\Controllers\BaseController;
use App\Models\InstructorModel;

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
                'data' => $this->getCurrentUser()
            ]
        ];

        return $this->renderView($page);
    }

    public function getCurrentUser() {
        $user_session = session()->get('user_session');
        $uid = $user_session['id'];
        $model = new InstructorModel;
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
