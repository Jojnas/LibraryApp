<?php

namespace classes\proxy;


use abstractClasses\proxy\PublicationProxy;
use interfaces\Publication;

class PrepaidPublicationProxy extends PublicationProxy
{
    protected $startPage;
    protected $endPage;

    public function __construct(Publication $publication, int $startPage, int $endPage)
    {
        parent::__construct($publication);
        $this->startPage = $startPage;
        $this->endPage = $endPage;
    }

    public function setPageNumber(int $page): bool
    {
        if ($this->startPage > $page || $this->endPage < $page) {
            throw new OutOfRangeException($page, $this->startPage, $this->endPage);
        }

        return $this->publication->setPageNumber($page);
    }

}