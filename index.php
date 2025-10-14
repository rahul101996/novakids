<?php

ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(E_ALL);

session_start();
require 'vendor/autoload.php';
include_once $_SERVER['DOCUMENT_ROOT'] . "/Helper/generalHelper.php";
//  printWithPre($_SESSION);
date_default_timezone_set('Asia/Kolkata');

// die();
// Load custom routing system
require_once 'app/RouteController.php';
require_once 'app/MiddlewareManager.php';

// Load all route definitions
$routes = require 'routes.php';

// Initialize AltoRouter
$router = new AltoRouter();

// Register all routes
foreach ($routes as $route) {
    $router->map('GET|POST', $route['path'], $route['controller']);
}

// Match the current request
$match = $router->match();

if ($match) {
    $target = $match['target']; // e.g., "UserController@dashboard"

    // Find the route definition by matching controller name
    $matchedRoute = null;
    foreach ($routes as $r) {
        if ($r['controller'] === $target) {
            $matchedRoute = $r;
            break;
        }
    }

    if (!$matchedRoute) {
        http_response_code(404);
        require __DIR__ . '/views/website/404.php';
        exit();
    }

    // Handle middleware (if any)
    if (!empty($matchedRoute['middleware'])) {
        try {
            MiddlewareManager::run($matchedRoute['middleware']);
        } catch (Exception $e) {
            http_response_code(500);
            exit("Middleware error: " . $e->getMessage());
        }
    }

    // Controller & method
    list($controllerName, $method) = explode('@', $target);
    $controllerPath = __DIR__ . "/controllers/$controllerName.php";

    if (!file_exists($controllerPath)) {
        http_response_code(404);
        require __DIR__ . '/views/website/404.php';
        exit();
    }

    require_once $controllerPath;

    if (!class_exists($controllerName)) {
        http_response_code(404);
        require __DIR__ . '/views/website/404.php';
        exit();
    }

    $controller = new $controllerName(getDBObject()->getConnection());

    if (!method_exists($controller, $method)) {
        http_response_code(404);
        require __DIR__ . '/views/website/404.php';
        exit();
    }

    // Call controller method
    call_user_func_array([$controller, $method], $match['params']);
} else {
    http_response_code(404);
    require __DIR__ . '/views/website/404.php';
    exit();
}
