<?php

namespace NoFw;

require __DIR__ . '/../vendor/autoload.php';

error_reporting(E_ALL);

$env = 'devel';

/* register error handler */
$whoops = new \Whoops\Run;
if ($env !== 'live') {
    $whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
} else {
    $whoops->pushHandler(function($e) {
        echo 'Friendly error page and send email about error to developer';
    });
}
$whoops->register();

throw new \Exception('Hello World');
