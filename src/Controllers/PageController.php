<?php

namespace NoFw\Controllers;

use Http\Response;

use NoFw\Template\FrontendRenderer;
use NoFw\Page\PageReader;
use NoFw\Page\InvalidPageException;

class PageController
{
    private $response;
    private $renderer;
    private $pageReader;

    public function __construct(Response $response, FrontendRenderer $renderer, PageReader $pageReader)
    {
        $this->response = $response;
        $this->renderer = $renderer;
        $this->pageReader = $pageReader;
    }

    public function show($params)
    {
        $slug = $params['slug'];

        try {
            $data = $this->pageReader->readBySlug($slug);
        } catch (InvalidPageException $e) {
            $this->response->setStatusCode(404);
            return $this->response->setContent('404 - Page not found');
        }

        $html = $this->renderer->render('page', $data);
        $this->response->setContent($html);
    }
}
