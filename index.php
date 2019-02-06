<?php

/*  Front controller  */

use Application\Components\Router;

// Settings
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT);
error_reporting(E_ALL);
session_start();

function handleUncaughtException($e) {
    echo $e->getMessage();
}

set_exception_handler("handleUncaughtException");

// Including files
define('ROOT', __DIR__ . '/');
require_once(ROOT . 'config/autoload.php');

// Router's invoke
(new Router())->run();
