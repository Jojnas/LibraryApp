<?php

namespace abstractFactory;

abstract class Row {
    protected $cells = [];

    public function addCell (Cell $cell)
    {
        $this->cells[] = $cell;
    }

    abstract public function show();

}