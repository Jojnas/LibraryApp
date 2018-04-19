<?php

namespace classes;

use classes\prototype\CD;
use interfaces\Publication;

class Book implements Publication
{
    const DAILY_RATE = 10;
    const DAILY_RATE_LONG_TIME = 7.50;
    protected $category;
    protected $pageCount;
    protected $pageNumber = 0;
    protected $closed = true;
    protected $cd = false;
    protected $symbol = null;
    protected $cede;

    public function __construct(string $category, int $pageCount)
    {
        $this->category = $category;
        $this->pageCount = $pageCount;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getPageCount(): int
    {
        return $this->pageCount;
    }

    public function open(): void
    {
        $this->closed = false;
    }

    public function setPageNumber(int $page): bool
    {
        if ($this->closed !== false || $this->pageCount < $page) {
            return false;
        }
        $this->pageNumber = $page;
        return true;
    }

    public function getPageNumber(): int
    {
        return $this->pageNumber;
    }

    public function close(): void
    {
        $this->setPageNumber(0);
        $this->closed = true;
    }

    public function __destruct()
    {
        if (!$this->closed) {
            $this->close();
        }
    }

    public function getDailyRate($days = 1): int
    {
        if ($days >= 14) {
            return self::DAILY_RATE_LONG_TIME;
        }
        return self::DAILY_RATE;
    }

    public function setCd(bool $cd): void
    {
        $this->cd = $cd;
    }


    public function hasCd(): bool
    {
        return $this->cd;
    }

    public function setSymbol(string $symbol): void
    {
        $this->symbol = $symbol;
    }


    public function getSymbol(): string
    {
        return $this->symbol;
    }

    public function getCede()
    {
        return $this->cede;
    }

    public function setCede(CD $cd): void
    {
        $this->cede = $cd;
    }

    // Prototype : cloning CD object - clone method will be automatically called by PHP interpreter once creating
    // a copy of an object
    public function  __clone()
    {
        $cd = clone $this->getCede();
        $this->setCd($cd);
    }


}