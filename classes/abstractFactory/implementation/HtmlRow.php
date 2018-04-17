<?php

namespace abstractFactory\implementation;

use abstractFactory\Row;

class HtmlRow extends Row {
    public function show(): void
    {
        print "<tr>\n";

        foreach ($this->cells as $cell){
            $cell->show();
        }

        print "</tr>\n";

    }
}