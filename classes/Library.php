<?php

namespace classes;


use abstractClasses\AbstractLibrary;
use interfaces\Publication;
use interfaces\visitor\Visitor;

class Library extends AbstractLibrary {

    public function addToLibrary($id, Publication $publication)
    {
        $this->storage->insertPublication($id, $publication);
        $this->debug('New book added to library: ' . $publication->getCategory());
    }

    public function acceptVisitor(Visitor $visitor)
    {
        $visitor->visitLibrary($this);
        foreach ($this->rentalActions as $rentalAction) {
            $rentalAction->acceptVisitor($visitor);
        }
    }
}