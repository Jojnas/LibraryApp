<?php

namespace classes;

use abstractClasses\factory\AbstractPublisher;

class BookPublisher extends AbstractPublisher {
    protected function createPublication(int $pageCount)
    {
        $publication = new Book($this->category, $pageCount);
        return $publication;
    }
}