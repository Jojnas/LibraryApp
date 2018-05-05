<?php

namespace classes\exceptions;


use Exception;

class OutOfRangeException extends Exception
{
    protected $page;
    protected $startPage;
    protected $endPage;

    public function __construct(int $page, int $startPage, int $endPage)
    {
        $this->page = $page;
        $this->startPage = $startPage;
        $this->endPage = $endPage;

        $this->message = sprintf(
          "Requested page numbder %d does not belong to content you paid for in range of pages %d - %d",
          $this->page, $this->startPage, $this->endPage
        );
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function getStartPage(): int
    {
        return $this->startPage;
    }

    public function getEndPage(): int
    {
        return $this->endPage;
    }

}