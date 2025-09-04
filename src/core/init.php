<?php
$is_https = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ||
            (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

$cookie_params = session_get_cookie_params();
session_set_cookie_params([
    'lifetime' => $cookie_params['lifetime'],
    'path' => $cookie_params['path'],
    'domain' => $cookie_params['domain'],
    'secure' => $is_https,
    'httponly' => true,
    'samesite' => 'Lax'
]);
session_start();
require_once BASE_PATH . '/functions/auth.php';
require_once BASE_PATH . '/functions/db_config.php';
require_once BASE_PATH . '/functions/common.php';
require_once BASE_PATH . '/functions/routing.php';