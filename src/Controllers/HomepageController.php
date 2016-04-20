<?php

namespace NoFw\Controllers;

use Http\Request;
use Http\Response;

use NoFw\Template\Renderer;

/**
 * Class HomepageController
 * @author yourname
 */
class HomepageController
{
    private $request;
    private $response;
    private $renderer;

    public function __construct(Request $request, Response $response, Renderer $renderer)
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

        $html = $this->renderer->render('<h1>Aloha!</h1> Hello {{name}}', $data);
        $this->response->setContent($html);
    }
}
