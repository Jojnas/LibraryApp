<?php

// Adapter : adjusts interface of particular class to interface required by client so it enables
// cooperation between those classes

namespace classes\adapter;


use interfaces\Publication;

class TitleAdapter implements Publication {
    protected $title;

    public function __construct(Title $title)
    {
        $this->title = $title;
    }

    public function open(): void
    {
        $this->title->setClosed(Title::TITLE_OPEN);
    }

    public function close(): void
    {
        $this->setPageNumber(0);
        $this->title->setClosed(Title::TITLE_CLOSE);
    }

    public function getCategory()
    {
        return $this->title->getInfo(Title::INFO_CATEGORY);
    }

    public function getPageCount()
    {
        return $this->title->getInfo(Title::INFO_PAGE_COUNT);

    }

    public function getDailyRate(int $days): int
    {
        return 12;
    }

    public function getPageNumber(): int
    {
        try {
            return $this->title->getCurrentPage();
        } catch (ClosedException $e) {
            return 0;
        }
    }

    public function setPageNumber(int $page): bool
    {
        $this->title->setCurrentPage($page);
        return true;
    }
}