<?php

namespace classes;

use interfaces\Publication;

class Book implements Publication
{
    const DAILY_RATE = 10;
    const DAILY_RATE_LONG_TIME = 7.50;
    protected $category;
    protected $pageCount;
    protected $pageNumber = 0;
    protected $closed = true;

    public function __construct(string $category, int $pageCount)
    {
        $this->category = $category;
        $this->pageCount = $pageCount;
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

}