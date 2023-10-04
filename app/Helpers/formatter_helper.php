<?php 

if(!function_exists('user_role')) {
    function user_role($role) {
        $roleString = '';
        switch($role) {
            case 1: 
                $roleString = 'instructor';
                break;
            case 2: 
                $roleString = 'student';
                break;
            default: 
                $roleString = 'administrator';
                break;
        }
        return $roleString;
    }
}

if(!function_exists('get_timestamp')) {
    function get_timestamp() {
        return date('Y-m-d');
    }
}

if(!function_exists('optimizeImageUpload')) {
    function optimizeImageUpload($path, $file, $filename) {
        $image = \Config\Services::image();
        $image->withFile($file)
        ->resize(800, 800, true, 'height')
        ->withResource()
        ->save($path . $filename, 50);
        return true;
    }   
}