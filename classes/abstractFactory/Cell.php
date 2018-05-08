<?php

namespace abstractFactory;

abstract class Cell {
//    has to be removed because of Flyweight
//    protected $content = null;
//
//    public function __construct($content)
//    {
//        $this->content = $content;
//    }


// adding parameter $data
    abstract public function show($data);
}