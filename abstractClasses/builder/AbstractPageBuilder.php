<?php

namespace abstractClasses\builder;

use classes\builder\Page;
use interfaces\builder\PageBuilder;

abstract class AbstractPageBuilder implements PageBuilder {
    protected $page;

    public function getPage()
    {
        return $this->page;
    }

    public function createNewPage()
    {
        $this->page = new Page();
    }
}