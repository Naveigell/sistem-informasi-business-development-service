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

$routes->get('/admin/login', 'Auth\AdminAuthController::index', ["as" => "admin.auth.login.index"]);
$routes->post('/admin/login', 'Auth\AdminAuthController::store', ["as" => "admin.auth.login.store"]);

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->group('admin', ['filter' => 'adminfilter'], function ($routes) {
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

    $routes->get('news-categories', 'Admin\NewsCategoryController::index', ["as" => "admin.news-categories.index"]);
    $routes->post('news-categories', 'Admin\NewsCategoryController::store', ["as" => "admin.news-categories.store"]);
    $routes->get('news-categories/create', 'Admin\NewsCategoryController::create', ["as" => "admin.news-categories.create"]);
    $routes->get('news-categories/(:num)/edit', 'Admin\NewsCategoryController::edit/$1', ["as" => "admin.news-categories.edit"]);
    $routes->put('news-categories/(:num)', 'Admin\NewsCategoryController::update/$1', ["as" => "admin.news-categories.update"]);
    $routes->delete('news-categories/(:num)', 'Admin\NewsCategoryController::destroy/$1', ["as" => "admin.news-categories.destroy"]);

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

    $routes->get('activity-programs', 'Admin\ActivityProgramController::index', ["as" => "admin.activity-programs.index"]);
    $routes->post('activity-programs', 'Admin\ActivityProgramController::store', ["as" => "admin.activity-programs.store"]);
    $routes->get('activity-programs/create', 'Admin\ActivityProgramController::create', ["as" => "admin.activity-programs.create"]);
    $routes->get('activity-programs/(:num)/edit', 'Admin\ActivityProgramController::edit/$1', ["as" => "admin.activity-programs.edit"]);
    $routes->put('activity-programs/(:num)', 'Admin\ActivityProgramController::update/$1', ["as" => "admin.activity-programs.update"]);
    $routes->delete('activity-programs/(:num)', 'Admin\ActivityProgramController::destroy/$1', ["as" => "admin.activity-programs.destroy"]);

    $routes->get('national-boards/(:num)/edit', 'Admin\NationalBoardController::edit/$1', ["as" => "admin.national-boards.edit"]);
    $routes->put('national-boards/(:num)', 'Admin\NationalBoardController::update/$1', ["as" => "admin.national-boards.update"]);

    $routes->get('forums', 'Admin\DiscussionForumController::index', ["as" => "admin.forums.index"]);
    $routes->post('forums', 'Admin\DiscussionForumController::store', ["as" => "admin.forums.store"]);
    $routes->get('forums/create', 'Admin\DiscussionForumController::create', ["as" => "admin.forums.create"]);
    $routes->get('forums/(:num)/edit', 'Admin\DiscussionForumController::edit/$1', ["as" => "admin.forums.edit"]);
    $routes->put('forums/(:num)', 'Admin\DiscussionForumController::update/$1', ["as" => "admin.forums.update"]);
    $routes->delete('forums/(:num)', 'Admin\DiscussionForumController::destroy/$1', ["as" => "admin.forums.destroy"]);
});

$routes->get('/logout', 'Auth\AuthController::logout', ["as" => "logout"]);
$routes->get('/login', 'Auth\MemberAuthController::login', ["as" => "member.auth.login.index"]);
$routes->post('/login', 'Auth\MemberAuthController::doLogin', ["as" => "member.auth.login.store"]);
$routes->get('/', 'Home::index', ["as" => "home"]);
$routes->get('/organization/history', 'Member\OrganizationController::history', ["as" => "member.organization.history"]);
$routes->get('/organization/vision-mission', 'Member\OrganizationController::visionMission', ["as" => "member.organization.vision-mission"]);
$routes->get('/organization/national-boards', 'Member\OrganizationController::nationalBoard', ["as" => "member.organization.national-boards"]);
$routes->get('/organization/regional-coordinators', 'Member\OrganizationController::regionalCoordinator', ["as" => "member.organization.regional-coordinators"]);

//$routes->get('/activity-programs', 'Member\ActivityProgramController::index', ["as" => "member.activity-programs"]);
$routes->get('/activity-programs/(:any)', 'Member\ActivityProgramController::detail/$1', ["as" => "member.activity-programs.show"]);

$routes->get('/news-categories/(:any)/news/(:any)', 'Member\NewsController::detail/$1/$2', ["as" => "member.news.show"]);
$routes->get('/news-categories/(:any)', 'Member\NewsController::index/$1', ["as" => "member.news-categories.index"]);

$routes->get('/chats', 'Member\ChatController::index', ["as" => "member.chats.index"]);
$routes->get('/chats/(:num)/edit', 'Member\ChatController::edit/$1', ["as" => "member.chats.edit"]);
$routes->post('/chats/(:num)/store', 'Member\ChatController::store/$1', ["as" => "member.chats.store"]);

$routes->get('/forums', 'Member\DiscussionForumController::index', ["as" => "member.forums.index"]);
$routes->get('/forums/(:num)/edit', 'Member\DiscussionForumController::edit/$1', ["as" => "member.forums.edit"]);
$routes->post('/forums/(:num)/store', 'Member\DiscussionForumController::store/$1', ["as" => "member.forums.store"]);

$routes->get('/profiles', 'Member\ProfileController::index', ["as" => "member.profiles.index"]);

$routes->group('api', function ($routes) {
    $routes->group('v1', function ($routes) {
        $routes->get('chats/(:num)/show', 'Api\Member\ChatController::show/$1', ["as" => "member.api.v1.chats.show"]);
        $routes->get('forums/(:num)/show', 'Api\Member\DiscussionForumController::show/$1', ["as" => "member.api.v1.forums.show"]);
    });
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
