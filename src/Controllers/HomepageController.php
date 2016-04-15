<?php

namespace NoFw\Controllers;

use Http\Response;

/**
 * Class HomepageController
 * @author yourname
 */
class HomepageController
{
    private $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function show()
    {
        $this->response->setContent('Hello World');
    }
}
