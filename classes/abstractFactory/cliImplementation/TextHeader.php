<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Header;

class TextHeader extends Header {
    public function show()
    {
        $str = '';
        for ($i = 0; $i < count($this->cells); $i++) {
            $str .= '+' . str_repeat('-', 15);
        }

        print $str . "+\n";

        foreach ($this->cells as $cell) {
            $cell->show();
        }

        print "|\n";
        print $str . "+\n";
    }
}