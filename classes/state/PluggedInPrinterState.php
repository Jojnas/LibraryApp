<?php
namespace classes\state;


use abstractClasses\state\AbstractPrinterState;
use interfaces\Publication;
use interfaces\state\Printer;

class PluggedInPrinterState extends AbstractPrinterState
{
    public function plugIn()
    {
        $this->throwExceptionIfAlreadyPluggedIn();
    }

    public function turnOn()
    {
        $this->printer->setState(
            $this->printer->getState(Printer::STATE_PLUGGED_IN)
        );

        print 'Printer turned on';
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
        $this->printer->setState($this->printer->getState(Printer::STATE_OFFLINE));
        print 'Printer disconnected';
    }

}