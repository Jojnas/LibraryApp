<?php
namespace classes\state;


use abstractClasses\state\AbstractPrinterState;
use interfaces\Publication;
use interfaces\state\Printer;

class WarmedUpPrinterState extends AbstractPrinterState
{
    public function plugIn()
    {
        $this->throwExceptionIfAlreadyPluggedIn();
    }

    public function turnOn()
    {
        $this->throwExceptionIfAlreadyTurnedOn();
    }

    public function warmUp()
    {
        $this->throwExceptionIfAlreadyWarmedUp();
    }

    public function printPublication(Publication $publication, $count = 1)
    {
        $pageCount = $publication->getPageCount() * $count;
        printf("Printed %d pages.\n", $pageCount);
        return $pageCount;
    }

    public function turnOff()
    {
        $this->printer->setState($this->printer->getState(Printer::STATE_PLUGGED_IN));
        print 'Printer turned off';
    }

    public function unPlug()
    {
        $this->throwExceptionIfPrinterRunning();
    }

}