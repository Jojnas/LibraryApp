<?php
namespace classes\facade;

// Facade : poskytuje rozhranie, ktore zjednodusi pouzivanie istej casti systemu

use abstractClasses\factory\AbstractPublisher;
use classes\Library;

class FacadePurchase
{
    protected $library = null;
    protected $publishers = [];

    public function __construct(Library $library)
    {
        $this->library = $library;
    }

    public function addPublisher($id, AbstractPublisher $publisher)
    {
        $this->publishers[$id] = $publisher;
    }

    public function purchase($publisher, $pageCount)
    {
        if (!isset($this->publishers[$publisher])) {
            throw new UnknownPublisherException('Unknown publisher');
        }

        $publication = $this->publishers[$publisher]->sellPublication($pageCount);
        $id = IdGenerator::getInstance()->generateId();
        $this->library->addToLibrary($id, $publication);

        return $publication;
    }
}
