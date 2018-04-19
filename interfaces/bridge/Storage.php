<?php


namespace interfaces\bridge;


use interfaces\Publication;

interface Storage {
    public function insertPublication($id, Publication $publication);
    public function fetchPublication();
}