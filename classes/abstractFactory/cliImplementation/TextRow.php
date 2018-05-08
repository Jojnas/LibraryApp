<?php

namespace classes\abstractFactory\cliImplementation;

use abstractFactory\Row;

class TextRow extends Row {
//    commenting out because of Flyweight
//    public function show()
//    {
//        foreach ($this->cells as $cell) {
//            $cell->show();
//        }
//
//        print "|\n";
//        $str = '';
//        for ($i = 0; $i < count($this->cells); $i++) {
//            $str .= '+' . str_repeat('-', 15);
//        }
//        print $str . "+\n";
//    }

    public function show()
    {
        foreach ($this->cellData as $data) {
            $this->flyWeightCell->show($data);
        }

        print "|\n";
        $str = '';
        for ($i = 0; $i < count($this->cellData); $i++) {
            $str .= '+' . str_repeat('-', 15);
        }
        print $str . "+\n";
    }
}