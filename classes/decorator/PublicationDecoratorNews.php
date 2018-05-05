<?php

namespace classes\decorator;


use abstractClasses\decorator\PublicationDecorator;

class PublicationDecoratorNews extends PublicationDecorator
{
    public function getDailyRate(int $days = 1): int
    {
        $rate = $this->publication->getDailyRate($days);
        return round($rate * 0.8, 2);
    }
}