<?php

// Abstract Factory - poskytuje rozhranie pre vytvorenie skupiny podobnych alebo suvisiacich objektov
// bez pomenovania konkretnych tried

namespace abstractFactory\implementation;

use abstractFactory\Cell;

class HtmlCell extends Cell {
    public function show() {
        printf("<td>%s</td>\n", $this->content);
    }
}