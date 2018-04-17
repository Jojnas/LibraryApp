<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Table;

class TextTable extends Table {
    public function show()
    {
        $this->header->show();

        foreach ($this->rows as $row) {
            $row->show();
        }

    }


}