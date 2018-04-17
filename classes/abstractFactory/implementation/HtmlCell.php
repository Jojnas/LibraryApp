<?php

namespace abstractFactory\implementation;

use abstractFactory\Cell;

class HtmlCell extends Cell {
    public function show() {
        printf("<td>%s</td>\n", $this->content);
    }
}