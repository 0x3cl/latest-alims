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
    $routes->get('discover', 'ViewsController::dashboard');


    // ACCOUNT GROUP ROUTES
    $routes->group('account', function($routes) {
        $routes->get('students', 'ViewsController::students');
        $routes->get('instructors', 'ViewsController::instructors');
        $routes->get('administrators', 'ViewsController::admins');
    });

    // ENROLL GROUP ROUTES
    $routes->group('enroll', function($routes) {
        $routes->get('students', 'ViewsController::students');
        $routes->get('instructors', 'ViewsController::instructors');
    });

    $routes->get('courses', 'ViewsController::courses');
    $routes->get('subjects', 'ViewsController::subjects');
    $routes->get('sections', 'ViewsController::sections');
    $routes->get('years', 'ViewsController::years');

    // SETTINGS GROUP ROUTES
    $routes->get('settings', function($routes) {
        $routes->get('smtp', 'ViewsController::smtp');
        $routes->get('filemanager', 'ViewsController::filemanager');
        $routes->get('reports', 'ViewsController::reports');
        $routes->get('backup', 'ViewsController::backup');
        $routes->get('profile', 'ViewsController::profile');
        $routes->get('passwords', 'ViewsController::passwords');
        $routes->get('signout', 'ViewsController::signout');
    });


});

// API ROUTES

$routes->group('api/v1', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('users', 'Users::index');
});