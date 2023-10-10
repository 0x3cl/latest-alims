<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');


// ADMIN ROUTES
$routes->group('admin', ['namespace' => '\App\Controllers\Admin'], function($routes) {
    $routes->get('/', 'ViewsController::index');
    $routes->get('login', 'ViewsController::login');
    $routes->get('dashboard', 'ViewsController::dashboard');

    $routes->get('bulk/upload', 'ViewsController::create_bulk');


    // ACCOUNT GROUP ROUTES
    $routes->group('account', function($routes) {
        $routes->get('students', 'ViewsController::students');
        $routes->get('students/add/single', 'ViewsController::create_students');
        $routes->get('instructors', 'ViewsController::instructors');
        $routes->get('instructors/add/single', 'ViewsController::create_instructors');

        $routes->get('update/user/single/(:num)', 'ViewsController::update_user/$1');

        $routes->get('administrators', 'ViewsController::admins');
        $routes->get('administrators/add/single', 'ViewsController::create_administrators');

        $routes->get('enroll/user/single/(:num)', 'ViewsController::create_enroll_user/$1');
        $routes->get('enroll/update/single/(:num)', 'ViewsController::update_enroll_user/$1');

    });

    // ENROLL GROUP ROUTES
    $routes->group('enroll', function($routes) {
        $routes->get('students', 'ViewsController::enroll_students');
        $routes->get('instructors', 'ViewsController::enroll_instructors');
    });

    $routes->group('courses', function($routes) {
        $routes->get('/', 'ViewsController::courses');
        $routes->get('add/single', 'ViewsController::create_course');
        $routes->get('update/single/(:num)', 'ViewsController::update_course/$1');
    });

    $routes->group('subjects', function($routes) {
        $routes->get('/', 'ViewsController::subjects');
        $routes->get('add/single', 'ViewsController::create_subject');
        $routes->get('update/single/(:num)', 'ViewsController::update_subject/$1');
    });

    $routes->group('sections', function($routes) {
        $routes->get('/', 'ViewsController::sections');
        $routes->get('add/single', 'ViewsController::create_section');
        $routes->get('update/single/(:num)', 'ViewsController::update_section/$1');
    });

    $routes->group('years', function($routes) {
        $routes->get('/', 'ViewsController::years');
        $routes->get('add/single', 'ViewsController::create_year');
        $routes->get('update/single/(:num)', 'ViewsController::update_year/$1');
    });


    // SETTINGS GROUP ROUTES
    $routes->group('system', function($routes) {
        $routes->get('smtp', 'ViewsController::smtp');
        $routes->get('filemanager', 'ViewsController::filemanager');
        $routes->get('reports', 'ViewsController::reports');
        $routes->get('backups', 'ViewsController::backup');

        $routes->group('backups', function($routes) {
            $routes->get('/', 'ViewsController::backup');
            $routes->get('(:any)(:any)/download', 'BackUpController::download/$1');
            $routes->post('(:any)/customize/download', 'BackUpController::download/$1');
        });
    });

    // SETTINGS GROUP ROUTES
    $routes->group('settings', function($routes) {
        $routes->get('me', 'ViewsController::me');
        $routes->get('passwords', 'ViewsController::passwords');
        $routes->get('signout', 'ViewsController::signout');
    });


});

// INSTRUCTOR ROUTES

$routes->group('instructor', ['namespace' => '\App\Controllers\Instructor'], function($routes) {
    $routes->get('/', 'ViewsController::index');
    $routes->get('login', 'ViewsController::login');
    $routes->get('dashboard', 'ViewsController::dashboard');
    $routes->get('courses', 'ViewsController::courses');
    $routes->get('subjects', 'ViewsController::subjects');
    $routes->get('subjects/posts', 'ViewsController::subjects_posts');
});

// API ROUTES

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api'], function($routes) {

    $routes->get('get-jwt-token', 'Token::generate_jwt');
    $routes->get('get-csrf-token', 'Token::generate_csrf');
    $routes->get('overview', 'Overview::index');

    // INSTRUCTORS
    $routes->get('post_group', 'PostGroup::getPostGroup');
    $routes->get('posts', 'Post::getPost');
    $routes->get('posts/all', 'Post::getPostAll');
    $routes->get('posts/attachments', 'Post::getPostAttachments');


    // API ROUTES FOR USERS
    $routes->group('users', function($routes) {
        $routes->get('/', 'Users::getUsers');
        $routes->get('my', 'Users::getMyData');
        $routes->get('my/admins', 'Users::getOtherAdmins');
        $routes->get('(:num)', 'Users::getUsers/$1');
        $routes->get('students', 'Users::getStudents');
        $routes->get('students/(:num)', 'Users::getStudents/$1');
        $routes->get('instructors', 'Users::getInstructors');
        $routes->get('instructors/(:num)', 'Users::getInstructors/$1');
        $routes->get('administrators', 'Users::getAdmins');
        $routes->get('administrators/(:num)', 'Users::getAdmins/$1');

        // INSTRUCTORS CLASS COURSE RELATED
        $routes->get('courses', 'Users::getCoursesByID');
        $routes->get('subjects', 'Users::getSubjectsByID');


        // ENROLLED USERS

        $routes->group('enrolled', function($routes) {
            $routes->get('students', 'EnrolledUsers::getEnrolledStudents');
            $routes->get('students/(:num)', 'EnrolledUsers::getEnrolledStudents/$1');
            $routes->get('instructors', 'EnrolledUsers::getEnrolledInstructors');
            $routes->get('instructors/(:num)', 'EnrolledUsers::getEnrolledInstructors/$1');
        });
    });

    $routes->get('courses', 'Courses::getCourses');
    $routes->get('courses/(:num)', 'Courses::getCourses/$1');

    $routes->get('subjects', 'Subjects::getSubjects');
    $routes->get('subjects/(:num)', 'Subjects::getSubjects/$1');

    $routes->get('years', 'Years::getYears');
    $routes->get('years/(:num)', 'Years::getYears/$1');

    $routes->get('sections', 'Sections::getSections');
    $routes->get('sections/(:num)', 'Sections::getSections/$1');
    
    $routes->get('smtp', 'Smtp::getSmtp');

    $routes->post('admin/login', 'AuthAdmin::login');
    $routes->get('admin/logout', 'AuthAdmin::logout');

    $routes->group('controls', function($routes) {
        $routes->post('enable/(:any)', 'Controls::enable/$1');
        $routes->post('disable/(:any)', 'Controls::disable/$1');
        $routes->post('delete/(:any)', 'Controls::delete/$1');
    });

    $routes->group('users', function($routes) {
        $routes->get('identify/(:num)', 'Users::getUserRole/$1');
        $routes->post('create/(:any)', 'Users::create_user/$1');
        $routes->post('update/(:any)/(:num)', 'Users::update_user/$1/$2');
        $routes->post('enroll/(:num)', 'Users::enroll_user/$1');
        $routes->post('enroll/update/(:num)', 'Users::update_enroll_user/$1');
    });

    $routes->group('courses', function($routes) {
        $routes->post('create', 'Courses::create');
        $routes->post('update/(:num)', 'Courses::update/$1');
    });

    $routes->group('subjects', function($routes) {
        $routes->post('create', 'Subjects::create');
        $routes->post('update/(:num)', 'Subjects::update/$1');
    });

    $routes->group('sections', function($routes) {
        $routes->post('create', 'Sections::create');
        $routes->post('update/(:num)', 'Sections::update/$1');
    });

    $routes->group('years', function($routes) {
        $routes->post('create', 'Years::create');
        $routes->post('update/(:num)', 'Years::update/$1');
    });

    $routes->group('smtp', function($routes) {
        $routes->post('update', 'Smtp::update');
    });

    $routes->group('my', function($routes) {
        $routes->post('info', 'Profile::update_info');
        $routes->post('bio', 'Profile::update_bio');
        $routes->post('avatar', 'Profile::update_avatar');
        $routes->post('banner', 'Profile::update_banner');
        $routes->post('password', 'Profile::update_password');
    });


    // PARSING FILE FOR BULK UPLOAD

    $routes->group('bulk', function($routes) {
        $routes->post('parse/file', 'Bulk\ParseFile::index');
        $routes->post('parse/file/upload', 'Bulk\UploadFile::index');
    });

    // GENERATE REPORT

    $routes->group('generate', function($routes) {
        $routes->post('report', 'Reports::index');
    });

    // FILEUPLOADER

    $routes->group('upload', function($routes) {
        $routes->post('(:any)', 'FileUploader::upload/$1');
    });

    // INSTRUCTORS API

    $routes->post('user/login', 'AuthUser::login');
    $routes->get('user/logout', 'AuthUser::logout');

    $routes->post('create/post', 'Post::create');
    $routes->post('update/post', 'Post::update');
    $routes->post('create/upload/attachment', 'Post::upload_attachment');
    $routes->post('delete/post', 'Post::delete_post');
    $routes->post('delete/attachment', 'Post::delete_attachment');
});