<?php

namespace NoFw\Template;

interface Renderer
{
    public function render($template, $data = []);
}
