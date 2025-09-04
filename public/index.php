<?php
/**
 * public/index.php - Front Controller
 *
 * This is the single entry point for all web requests.
 * It initializes the application and dispatches requests to the appropriate controller.
 */

define('BASE_PATH', __DIR__ . '/../src');
require_once BASE_PATH . '/core/init.php';

$request_uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

// echo "<pre>" . print_r($_SERVER['SCRIPT_NAME'], true) . "</pre>";
// echo "<pre>" . print_r($request_uri, true) . "</pre>";
// exit;

$route = 'home';

if(!empty($request_uri)) {
    $segments = explode('/', $request_uri);
    $route = $segments[0];
}


switch($route) {
    case '':
    case 'home':
    case '':
    case 'home':
        if (is_logged_in()) {
            header('Location: /user/dashboard');
            exit();
        }
        require_once BASE_PATH . '/views/home/index.php';
        break;
    case 'user':
        $action = $segments[1] ?? 'dashboard';
        displayUserRoute($action, $pdo);
        break;
    case 'toilet':
        $action = $segments[1] ?? 'dashboard';
        displayToiletRoute($action, $pdo);
        break;
    case 'review':
        $action = $segments[1] ?? 'dashboard';
        displayReviewRoute($action, $pdo);
        break;
    default:
        header("HTTP/1.0 404 Not Found");
        echo "404 Not Found";
        break;
}
