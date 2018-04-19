<?php


namespace abstractClasses\decorator;


use interfaces\Publication;

abstract class PublicationDecorator {
    protected $publication;

    public function __construct(Publication $publication)
    {
        $this->publication = $publication;
    }

    public function open()
    {
        return $this->publication->open();
    }

    public function close()
    {
        return $this->publication->close();
    }

    public function setPageNumber()
    {
        return $this->publication->getPageNumber();
    }

    public function getPageNumber()
    {
        return $this->publication->getPageNumber();
    }

    public function getDailyRate(int $days = 1)
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