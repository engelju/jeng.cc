<?php

namespace NoFw\Template;

use Symfony\Component\Yaml\Parser;

class FrontendTwigRenderer implements FrontendRenderer
{
    private $renderer;

    public function __construct(Renderer $renderer)
    {
        $this->renderer = $renderer;
    }

    public function render($template, $data = [])
    {
        $yaml = new Parser();
        $navbar_items = $yaml->parse(file_get_contents('../config/nav.yml'));

        return $this->renderer->render($template, array_merge($data, $navbar_items));
    }
}
