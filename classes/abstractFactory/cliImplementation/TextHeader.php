<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Header;

class TextHeader extends Header {
//    commenting out because of Flyweight
//    public function show()
//    {
//        $str = '';
//        for ($i = 0; $i < count($this->cells); $i++) {
//            $str .= '+' . str_repeat('-', 15);
//        }
//
//        print $str . "+\n";
//
//        foreach ($this->cells as $cell) {
//            $cell->show();
//        }
//
//        print "|\n";
//        print $str . "+\n";
//    }

    public function show()
    {
        $str = '';
        for ($i = 0; $i < count($this->cellData); $i++) {
            $str .= '+' . str_repeat('-', 15);
        }

        print $str . "+\n";

        foreach ($this->cellData as $data) {
            $this->flyWeightCell->show($data);
        }

        print "|\n";
        print $str . "+\n";
    }
}