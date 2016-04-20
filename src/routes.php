<?php

return [
    ['GET', '/hello-world', ['NoFw\Controllers\HomepageController', 'show']],
    ['GET', '/{slug}', ['NoFw\Controllers\PageController', 'show']],
];
