<?php

namespace abstractClasses\proxy;

// PROXY - controlling access to an object using an deputy which is being used instead of original object

use interfaces\Publication;

class PublicationProxy implements Publication
{
    protected $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }

    public function open(): void
    {
        return $this->publication->open();
    }

    public function close(): void
    {
        return $this->publication->close();
    }

    public function setPageNumber(int $page): bool
    {
        return $this->publication->setPageNumber($page);
    }

    public function getPageNumber(): int
    {
        return $this->publication->getPageNumber();
    }

    public function getDailyRate(int $days = 1): int
    {
        return $this->publication->getDailyRate($days);
    }

    public function getCategory()
    {
        return $this->publication->getCategory();
    }

    public function getPageCount()
    {
        return $this->publication->getPageCount();
    }
}