<?php

namespace NoFw\Controllers;

use Http\Request;
use Http\Response;

use NoFw\Template\FrontendRenderer;

class HomepageController
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, FrontendRenderer $renderer)
    {
        $this->request  = $request;
        $this->response = $response;
        $this->renderer = $renderer;
    }

    public function show()
    {
        $data = [
            'name' => $this->request->getParameter('name', 'stranger'),
        ];

        $html = $this->renderer->render('homepage', $data);
        $this->response->setContent($html);
    }
}
