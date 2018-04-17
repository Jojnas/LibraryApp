<?php

namespace classes\builder;

use abstractClasses\builder\AbstractPageBuilder;

class FirstPageBuilder extends AbstractPageBuilder {
    public function buildHeader()
    {
        $this->page->setHeader('Header of 1st page');
    }

    public function buildBody()
    {
        $this->page->setBody('Body of 1st page');
    }

    public function buildFooter()
    {
        $this->page->setFooter('Footer of 1st page');
    }
}