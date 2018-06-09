<?php
namespace classes\state;


use abstractClasses\state\AbstractPrinterState;
use interfaces\Publication;
use interfaces\state\Printer;

class OfflinePrinterState extends AbstractPrinterState
{
    public function plugIn()
    {
        $this->printer->setState(
            $this->printer->getState(Printer::STATE_PLUGGED_IN)
        );
        print 'Printer plugged in';
    }

    public function turnOn()
    {
        $this->throwExceptionIfNotPluggedIn();
    }

    public function warmUp()
    {
        $this->throwExceptionIfNotTurnedOn();
    }

    public function printPublication(Publication $publication, $count = 1)
    {
        $this->throwNotPossibleException();
    }

    public function turnOff()
    {
        $this->throwExceptionIfNotTurnedOn();
    }

    public function unPlug()
    {
        $this->throwExceptionIfNotPluggedIn();
    }

}