<?php

namespace classes;

use abstractClasses\factory\AbstractPublisher;

class JournalPublisher extends AbstractPublisher {
    protected function createPublication(int $pageCount)
    {
        $publication = new Journal($this->category, $pageCount);
        return $publication;
    }
}