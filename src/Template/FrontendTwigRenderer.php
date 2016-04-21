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
        $data = array_merge($data, [
            'menuItems' => [
                ['href' => '/', 'text' => 'Homepage'],
                ['href' => '/about', 'text' => 'About'],
            ],
        ]);
        return $this->renderer->render($template, $data);
    }
}
