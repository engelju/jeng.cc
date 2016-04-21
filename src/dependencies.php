<?php

$injector = new \Auryn\Injector;

$injector->define('Http\HttpRequest', [
    ':get' => $_GET,
    ':post' => $_POST,
    ':cookies' => $_COOKIE,
    ':files' => $_FILES,
    ':server' => $_SERVER,
]);
$injector->alias('Http\Request', 'Http\HttpRequest');
$injector->share('Http\HttpRequest');

$injector->alias('Http\Response', 'Http\HttpResponse');
$injector->share('Http\HttpResponse');

$injector->define('Mustache_Engine', [
    ':options' => [
        'loader' => new Mustache_Loader_FilesystemLoader(dirname(__DIR__) . '/templates', [
            'extension' => '.html', // use html instead of default .moustache file ext
        ]),
    ]
]);
$injector->delegate('Twig_Environment', function() use ($injector) {
    $loader = new Twig_Loader_Filesystem(dirname(__DIR__) . '/templates');
    $twig = new Twig_Environment($loader);
    return $twig;
});
$injector->alias('NoFw\Template\Renderer', 'NoFw\Template\TwigRenderer');

$injector->define('NoFw\Page\FilePageReader', [
    ':pageFolder' => __DIR__ . '/../pages',
]);
$injector->alias('NoFw\Page\PageReader', 'NoFw\Page\FilePageReader');
$injector->share('NoFw\Page\FilePageReader');

return $injector;
