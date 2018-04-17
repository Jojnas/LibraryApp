<?php

namespace abstractFactory\implementation;

use abstractFactory\Table;

class HtmlTable extends Table {
    public function show()
    {
        print "<table border=\"1\">\n";
        $this->header->show();

        foreach ($this->rows as $row) {
            $row->show();
        }

        print "</table>\n";
    }
}