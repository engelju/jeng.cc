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

/* setup http handler */
$request  = new \Http\HttpRequest($_GET, $_POST, $_COOKIE, $_FILES, $_SERVER);
$response = new \Http\HttpResponse;

/* test content
$content = '<h1>Hello World</h1>';
$response->setContent($content);

$response->setContent('404 - Page not found');
$response->setStatusCode(404);
*/

foreach ($response->getHeaders() as $header) {
    header($header, false);
}

echo $response->getContent();
