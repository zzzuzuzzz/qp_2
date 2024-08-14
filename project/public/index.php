<?php

error_reporting(E_ALL);
ini_set('display_errors', true);

define('APP_DIR', dirname(__DIR__));

require_once APP_DIR . '/vendor/autoload.php';
require_once APP_DIR . '/bootstrap.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use ProjectApp\Application;
use ProjectApp\Contracts\Services\ConfigContract;
use ProjectApp\Controllers\AdminController;
use ProjectApp\Controllers\ApiCarsController;
use ProjectApp\Controllers\CatalogController;
use ProjectApp\Controllers\LoginController;
use ProjectApp\Controllers\PagesController;
use ProjectApp\Router;
use Symfony\Component\HttpFoundation\Request;

$router = new Router();

$router->get('/', [PagesController::class, 'home']);

$router->get('/catalog', [CatalogController::class, 'catalog']);
$router->get('/catalog/*', [CatalogController::class, 'detail']);

$router->get('/api/cars', [ApiCarsController::class, 'cars']);

$router->get('/login/', [LoginController::class, 'login']);
$router->post('/login/', [LoginController::class, 'authorize']);
$router->get('/logout/', [LoginController::class, 'logout']);

$router->get('/admin/', [AdminController::class, 'admin']);
$router->get('/admin/create', [AdminController::class, 'createPage']);
$router->post('/admin/store', [AdminController::class, 'store']);
$router->delete('/admin/delete/*', [AdminController::class, 'delete']);
$router->get('/admin/*', [AdminController::class, 'edit']);
$router->post('/admin/update/*', [AdminController::class, 'update']);


$application = new Application($router, new Capsule(), container()->get(ConfigContract::class));

$response = $application->run(Request::createFromGlobals());
$response->send();
