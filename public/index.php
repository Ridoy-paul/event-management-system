<?php

// Include the bootstrap file
require __DIR__ . '/../bootstrap.php';

// Your routing or controller logic here
if ($_SERVER['REQUEST_URI'] === '/events') {
    (new \App\Controllers\EventController())->list();
} elseif ($_SERVER['REQUEST_URI'] === '/register') {
    (new \App\Controllers\AuthController())->register();
} else {
    echo "404 - Page not found.";
}
