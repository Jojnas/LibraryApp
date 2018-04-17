<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Cell;

class TextCell extends Cell {
    public function show()
    {
        $diff = strlen($this->content) - mb_strlen($this->content, 'UTF-8');
        print '|' . str_pad($this->content, 15 + $diff);
    }
}