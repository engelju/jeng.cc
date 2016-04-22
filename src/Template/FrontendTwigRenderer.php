<?php

namespace NoFw\Template;

class FrontendTwigRenderer implements FrontendRenderer
{
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $data = [])
    {
        // todo: use yaml to read this in
        $navbar_items = [
            'menuItems' => [
                ['href' => '/', 'text' => 'Homepage'],
                ['href' => '/about', 'text' => 'About'],
                ['href' => '/first-page', 'text' => 'Test'],
            ],
        ];
        
        return $this->renderer->render($template, array_merge($data, $navbar_items));
    }
}
