<?php
namespace classes\state;

use abstractClasses\state\AbstractPrinterState;
use interfaces\Publication;
use interfaces\state\Printer;

class TurnedOnPrinterState extends AbstractPrinterState
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
        $this->printer->setState($this->printer->getState(Printer::STATE_WARMED_UP));
        print 'Printer warmed up';
    }

    public function printPublication(Publication $publication, $count = 1)
    {
        $this->throwNotPossibleException();
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