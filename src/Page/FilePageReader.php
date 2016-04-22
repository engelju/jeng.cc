<?php

namespace NoFw\Page;

use InvalidArgumentException;
use Symfony\Component\Yaml\Parser;

class FilePageReader implements PageReader
{
    private $pageFolder;

    public function __construct($pageFolder)
    {
        if (!is_string($pageFolder)) {
            throw new InvalidArgumentException('pageFolder must be a string');
        }
        $this->pageFolder = $pageFolder;
    }

    public function readBySlug($slug)
    {
        if (!is_string($slug)) {
            throw new InvalidArgumentException('slug must be a string');
        }

        $file = "$this->pageFolder/$slug.yml";
        if (!file_exists($file)) {
            throw new InvalidPageException($slug);
        }

        $yaml = new Parser();
        return $yaml->parse(file_get_contents($file));
    }
}
