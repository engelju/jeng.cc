<?php

namespace NoFw\Controllers;

use Http\Response;

use NoFw\Template\Renderer;
use NoFw\Page\PageReader;

class PageController
{
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Response $response, Renderer $renderer, PageReader $pageReader)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params)
    {
        $slug = $params['slug'];
        $data['content'] = $this->pageReader->readBySlug($slug);

        $html = $this->renderer->render('Page', $data);
        $this->response->setContent($html);
    }
}
