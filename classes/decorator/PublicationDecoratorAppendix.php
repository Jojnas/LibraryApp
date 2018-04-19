<?php

namespace classes\decorator;

use abstractClasses\decorator\PublicationDecorator;

class PublicationDecoratorAppendix extends PublicationDecorator {
    public function getDailyRate(int $days = 1): int
    {
        $rate = $this->publication->getDailyRate($days);
        return $rate + 2;
    }

    public function getPageCount(): int
    {
        $pageCount = $this->publication->getPageCount();
        return $pageCount + 10;
    }
}