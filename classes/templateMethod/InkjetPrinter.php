<?php

namespace classes\methodTemplate;


use abstractClasses\templateMethod\AbstractPrinter;

class InkjetPrinter extends AbstractPrinter
{
    protected function replaceCartridge()
    {
        print 'Changing toner BBB-222';
    }

    protected function checkPrintingParts()
    {
        print 'Checking inkjet parts';
    }

    protected function isLowPaperAmount()
    {
        if ($this->paperAmount < 100) {
            return true;
        }

        return false;

    }
}