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
    $routes->get('discover', 'ViewsController::discover');


    // ACCOUNT GROUP ROUTES
    $routes->group('account', function($routes) {
        $routes->get('students', 'ViewsController::students');
        $routes->get('instructors', 'ViewsController::instructors');
        $routes->get('administrators', 'ViewsController::admins');
    });

    // ENROLL GROUP ROUTES
    $routes->group('enroll', function($routes) {
        $routes->get('students', 'ViewsController::enroll_students');
        $routes->get('instructors', 'ViewsController::enroll_instructors');
    });

    $routes->get('courses', 'ViewsController::courses');
    $routes->get('subjects', 'ViewsController::subjects');
    $routes->get('sections', 'ViewsController::sections');
    $routes->get('years', 'ViewsController::years');

    // SETTINGS GROUP ROUTES
    $routes->group('system', function($routes) {
        $routes->get('smtp', 'ViewsController::smtp');
        $routes->get('filemanager', 'ViewsController::filemanager');
        $routes->get('reports', 'ViewsController::reports');
        $routes->get('backups', 'ViewsController::backup');
    });

    // SETTINGS GROUP ROUTES
    $routes->group('settings', function($routes) {
        $routes->get('me', 'ViewsController::me');
        $routes->get('passwords', 'ViewsController::passwords');
        $routes->get('signout', 'ViewsController::signout');
    });


});

// API ROUTES

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api'], function($routes) {

    $routes->get('get-jwt-token', 'Token::generate_jwt');
    $routes->get('get-csrf-token', 'Token::generate_csrf');
    $routes->get('overview', 'Overview::index');

    // API ROUTES FOR USERS
    $routes->group('users', function($routes) {
        $routes->get('/', 'Users::getUsers');
        $routes->get('(:num)', 'Users::getUsers/$1');
        $routes->get('students', 'Users::getStudents');
        $routes->get('students/(:num)', 'Users::getStudents/$1');
        $routes->get('instructors', 'Users::getInstructors');
        $routes->get('instructors/(:num)', 'Users::getInstructors/$1');
        $routes->get('administrators', 'Users::getAdmins');
        $routes->get('administrators/(:num)', 'Users::getAdmins/$1');

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

    $routes->get('years', 'Year::getYears');
    $routes->get('years/(:num)', 'Year::getYears/$1');

    $routes->get('sections', 'Section::getSections');
    $routes->get('sections/(:num)', 'Section::getSections/$1');
    
    $routes->get('smtp', 'Smtp::getSmtp');

    $routes->post('admin/login', 'AuthAdmin::login');
    $routes->get('admin/logout', 'AuthAdmin::logout');

    $routes->group('controls', function($routes) {
        $routes->post('enable/(:any)', 'Controls::enable/$1');
        $routes->post('disable/(:any)', 'Controls::disable/$1');
        $routes->post('delete/(:any)', 'Controls::delete/$1');
    });

});