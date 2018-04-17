<?php

namespace abstractFactory\implementation;

use abstractFactory\Header;

class HtmlHeader extends Header {
    public function show()
    {
        print "<tr style=\"font-weight: bold;\">\n";

        foreach ($this->cells as $cell) {
            $cell->show();
        }

        print "</tr>\n";
    }
}

