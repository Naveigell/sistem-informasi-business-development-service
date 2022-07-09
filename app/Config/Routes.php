<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin', function ($routes) {
    $routes->get('consultants', 'Admin\ConsultantController::index', ["as" => "admin.consultants.index"]);
    $routes->post('consultants', 'Admin\ConsultantController::store', ["as" => "admin.consultants.store"]);
    $routes->get('consultants/create', 'Admin\ConsultantController::create', ["as" => "admin.consultants.create"]);
    $routes->get('consultants/(:num)/edit', 'Admin\ConsultantController::edit/$1', ["as" => "admin.consultants.edit"]);
    $routes->put('consultants/(:num)', 'Admin\ConsultantController::update/$1', ["as" => "admin.consultants.update"]);
    $routes->delete('consultants/(:num)', 'Admin\ConsultantController::destroy/$1', ["as" => "admin.consultants.destroy"]);

    $routes->get('clients', 'Admin\ClientController::index', ["as" => "admin.clients.index"]);
    $routes->post('clients', 'Admin\ClientController::store', ["as" => "admin.clients.store"]);
    $routes->get('clients/create', 'Admin\ClientController::create', ["as" => "admin.clients.create"]);
    $routes->get('clients/(:num)/edit', 'Admin\ClientController::edit/$1', ["as" => "admin.clients.edit"]);
    $routes->put('clients/(:num)', 'Admin\ClientController::update/$1', ["as" => "admin.clients.update"]);
    $routes->delete('clients/(:num)', 'Admin\ClientController::destroy/$1', ["as" => "admin.clients.destroy"]);

    $routes->get('news', 'Admin\NewsController::index', ["as" => "admin.news.index"]);
    $routes->post('news', 'Admin\NewsController::store', ["as" => "admin.news.store"]);
    $routes->get('news/create', 'Admin\NewsController::create', ["as" => "admin.news.create"]);
    $routes->get('news/(:num)/edit', 'Admin\NewsController::edit/$1', ["as" => "admin.news.edit"]);
    $routes->put('news/(:num)', 'Admin\NewsController::update/$1', ["as" => "admin.news.update"]);
    $routes->delete('news/(:num)', 'Admin\NewsController::destroy/$1', ["as" => "admin.news.destroy"]);

    $routes->get('histories/(:num)/edit', 'Admin\HistoryController::edit/$1', ["as" => "admin.histories.edit"]);
    $routes->put('histories/(:num)', 'Admin\HistoryController::update/$1', ["as" => "admin.histories.update"]);

    $routes->get('vision-missions/(:num)/edit', 'Admin\VisionMissionController::edit/$1', ["as" => "admin.vision-missions.edit"]);
    $routes->put('vision-missions/(:num)', 'Admin\VisionMissionController::update/$1', ["as" => "admin.vision-missions.update"]);

    $routes->get('regional-coordinators', 'Admin\RegionalCoordinatorController::index', ["as" => "admin.regional-coordinators.index"]);
    $routes->post('regional-coordinators', 'Admin\RegionalCoordinatorController::store', ["as" => "admin.regional-coordinators.store"]);
    $routes->get('regional-coordinators/create', 'Admin\RegionalCoordinatorController::create', ["as" => "admin.regional-coordinators.create"]);
    $routes->get('regional-coordinators/(:num)/edit', 'Admin\RegionalCoordinatorController::edit/$1', ["as" => "admin.regional-coordinators.edit"]);
    $routes->put('regional-coordinators/(:num)', 'Admin\RegionalCoordinatorController::update/$1', ["as" => "admin.regional-coordinators.update"]);
    $routes->delete('regional-coordinators/(:num)', 'Admin\RegionalCoordinatorController::destroy/$1', ["as" => "admin.regional-coordinators.destroy"]);
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
