<?php

function root_path($path = '')
{
    $basePath = dirname(__DIR__, 2);
    return $path !== '' ? $basePath . DIRECTORY_SEPARATOR . $path : $basePath;
}

define('VIEW_PATH', root_path('app/View/'));
define('CONTROLLER_PATH', root_path('app/Controllers/'));

