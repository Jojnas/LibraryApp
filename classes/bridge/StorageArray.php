<?php

namespace classes\bridge;


use interfaces\bridge\Storage;
use interfaces\Publication;

class StorageArray implements  Storage {
    protected $publications;

    public function insertPublication($id, Publication $publication)
    {
        $this->publications[$id] = $publication;
    }

    public function fetchPublication()
    {
        return $this->publications;
    }
}