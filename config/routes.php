<?php

require __DIR__ . '/../bootstrap.php';

$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '':
    case '/':
        $controller = new \App\Controllers\HomeController();
        $controller->index();
        break;

    case '/views/users':
        $controller = new \App\Controllers\EventController();
        $controller->index();
        break;

    case '/contact':
        $controller = new \App\Controllers\EventController();
        $controller->contact();
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/../views/404.php';
        break;
}
