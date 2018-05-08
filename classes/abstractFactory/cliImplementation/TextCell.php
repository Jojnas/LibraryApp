<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Cell;

class TextCell extends Cell {

    // because of Flyweight using $data instead of $this->>content
//    public function show()
//    {
//        $diff = strlen($this->content) - mb_strlen($this->content, 'UTF-8');
//        print '|' . str_pad($this->content, 15 + $diff);
//    }

    public function show($data)
    {
        $diff = strlen($data) - mb_strlen($data, 'UTF-8');
        print '|' . str_pad($data, 15 + $diff);
    }
}