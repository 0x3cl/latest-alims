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