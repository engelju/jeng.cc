<?php

namespace NoFw\Page;

use InvalidArgumentException;

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

        $file = "$this->pageFolder/$slug.html";
        if (!file_exists($file)) {
            throw new InvalidPageException($slug);
        }

        return file_get_contents($file);
    }
}
