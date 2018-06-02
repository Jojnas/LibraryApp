<?php

namespace classes\methodTemplate;

use abstractClasses\templateMethod\AbstractPrinter;

class LaserPrinter extends AbstractPrinter
{

    protected function replaceCartridge()
    {
        print 'Changing toner AAA-111';
    }

    protected function checkPrintingParts()
    {
        print 'Checking laser parts';
    }

    protected function isLowPaperAmount()
    {
        if ($this->paperAmount < 200) {
            return true;
        }

        return false;
    }
}