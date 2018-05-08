<?php

namespace abstractFactory;

// Flyweight: used to common usage of very similar objects in order to decrease memory usage


abstract class Row {
    protected $cells = [];
    protected $flyWeightCell;

    public function addCell (Cell $cell)
    {
//        $this->cells[] = $cell;
        $this->flyWeightCell = $cell;
    }

    abstract public function show();

}