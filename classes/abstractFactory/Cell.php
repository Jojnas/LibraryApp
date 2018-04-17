<?php

namespace abstractFactory;

abstract class Cell {
    protected $content = null;

    public function __construct($content)
    {
        $this->content = $content;
    }

    abstract public function show();
}