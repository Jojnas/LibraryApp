<?php


// book class alternative coming from another 3rd party for adapter purposes

namespace classes\adapter;


class Title
{
    const INFO_CATEGORY = 'category';
    const INFO_PAGE_COUNT = 'pageCount';
    const TITLE_OPEN = 1;
    const TITLE_CLOSE = 0;

    protected $info = [];
    protected $currentPage = 0;
    protected $state = self::TITLE_CLOSE;

    public function __construct(int $pageCount, string $category)
    {
        $this->info[self::INFO_PAGE_COUNT] = $pageCount;
        $this->info[self::INFO_CATEGORY] = $category;
    }

    public function getInfo(string $info)
    {
        if (isset($this->info[$info])) {
            return $this->info[$info];
        }
    }

    public function setClosed(int $state)
    {
        $this->state = $state;
    }

    public function getClosed(): int
    {
        return $this->state;
    }

    public function setCurrentPage(int $page): void
    {
        if (self::TITLE_CLOSE == $this->state) {
            $this->setClosed(self::TITLE_OPEN);
        }
        $this->currentPage = $page;
    }

    public function getCurrentPage()
    {
        if (self::TITLE_CLOSE == $this->state) {
            throw new ClosedException('Book is not open');
        }

        return $this->currentPage;
    }

}