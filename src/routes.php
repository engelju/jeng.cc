<?php

return [
    ['GET', '/', ['NoFw\Controllers\HomepageController', 'show']],
    ['GET', '/hello-world', ['NoFw\Controllers\HomepageController', 'show']],
    ['GET', '/{slug}', ['NoFw\Controllers\PageController', 'show']],
];
