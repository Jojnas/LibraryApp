<?php

namespace abstractClasses;

// Factory Method - definuje rozhranie pre vytvaranie objektov, pri com tvorbu instancii prenechava svojim potomkom

abstract class AbstractPublisher {
    protected $category;

    public function __construct(string $category)
    {
        $this->category = $category;
    }

    public function sellPublication(int $pageCount)
    {
        $publication = $this->createPublication($pageCount);
        $publication->open();

        $page = mt_rand(1, $pageCount);
        $publication->setPageNumber($page);

        $publication->close();

        return $publication;

    }

    abstract protected function createPublication(int $pageCount);



}