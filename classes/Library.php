<?php

namespace classes;


use abstractClasses\AbstractLibrary;
use interfaces\Publication;

class Library extends AbstractLibrary {

    public function addToLibrary($id, Publication $publication)
    {
        $this->storage->insertPublication($id, $publication);
        $this->debug('New book added to library: ' . $publication->getCategory());
    }
}