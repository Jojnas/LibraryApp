<?php

namespace classes\builder;

use abstractClasses\builder\AbstractPageBuilder;

class LastPageBuilder extends AbstractPageBuilder {
    public function buildHeader()
    {
        $this->page->setHeader('Header of last page');
    }

    public function buildBody()
    {
        $this->page->setBody('Body of last page');
    }

    public function buildFooter()
    {
        $this->page->setFooter('Footer of last page');
    }
}