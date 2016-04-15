<?php

return [
    ['GET', '/hello-world', ['NoFw\Controllers\HomepageController', 'show']],
    ['GET', '/another-route', function () {
        echo 'This works too';
    }],
];
