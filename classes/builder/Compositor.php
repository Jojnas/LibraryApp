<?php

// this class is called Director because only this class knows how to build a page

// Builder - oddeluje konstrukciu komplexnych objektov od ich reprezentacie (obsahu)

namespace classes\builder;

use interfaces\builder\PageBuilder;

class Compositor {
    protected $pageBuilder;

    public function setPageBuilder(PageBuilder $pageBuilder): void
    {
        $this->pageBuilder = $pageBuilder;
    }

    public function getPageBuilder()
    {
        return $this->pageBuilder->getPage();
    }

    public function compositePage()
    {
        $this->pageBuilder->createNewPage();
        $this->pageBuilder->buildHeader();
        $this->pageBuilder->buildBody();
        $this->pageBuilder->buildFooter();
    }

}