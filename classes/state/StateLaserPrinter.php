<?php

namespace classes\state;


use interfaces\Publication;
use interfaces\state\Printer;
use interfaces\state\PrinterState;

class StateLaserPrinter implements Printer
{
    protected $state;
    protected $states = [];
    protected $type = null;
    protected $pageCounter = 0;

    function __construct($type)
    {
        $this->type = $type;

        $this->states[Printer::STATE_OFFLINE] = new OfflinePrinterState($this);
        $this->states[Printer::STATE_PLUGGED_IN] = new PluggedInPrinterState($this);
        $this->states[Printer::STATE_TURNED_ON] = new TurnedOnPrinterState($this);
        $this->states[Printer::STATE_WARMED_UP] = new WarmedUpPrinterState($this);

        $this->state = $this->getState(Printer::STATE_OFFLINE);
    }

    public function plugIn()
    {
        $this->state->plugIn();
    }

    public function turnOn()
    {
        $this->state->turnOn();
    }

    public function warmUp()
    {
        $this->state->warmUp();
    }

    public function printPublication(Publication $publication, $count = 1)
    {
        $pageCount = $this->state->printPublication($publication, $count);
        if (false !== $pageCount) {
            $this->pageCounter += $pageCount;
        }
    }

    public function turnOff()
    {
        $this->state->turnOff();
    }

    public function unPlug()
    {
        $this->state->unPlug();
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPageCounter()
    {
         return $this->pageCounter;
    }

    public function getState($stateId)
    {
        return $this->states[$stateId];
    }

    public function setState(PrinterState $state)
    {
        printf("Printer changes its state: %s. \n", get_class($state));
        $this->state = $state;
    }
}