<?php

namespace classes\state;


use http\Exception\BadMethodCallException;
use interfaces\Publication;
use interfaces\state\Printer;
use interfaces\state\PrinterState;

class LaserPrinter implements Printer
{
    protected $pluggedIn = false;
    protected $turnedOn = false;
    protected $warmedUp = false;
    protected $type = null;
    protected $pageCounter = 0;

    function __construct($type)
    {
        $this->type = $type;
    }

    public function plugIn()
    {
        $this->pluggedIn = true;
        print 'Printer plugged in';
    }

    private function throwExceptionIfNotPluggedIn()
    {
        if (true !== $this->pluggedIn) {
            throw new BadMethodCallException(
                'Printer was not plugged in'
            );
        }
    }

    private function throwExceptionIfNotTurnedOn()
    {
        if (true !== $this->turnedOn) {
            throw new BadMethodCallException(
                'Printer was not turned on'
            );
        }
    }


    private function throwExceptionIfNotWarmedUp()
    {
        if (true !== $this->warmedUp) {
            throw new BadMethodCallException(
                'Printer is not warmed up'
            );
        }
    }

    public function turnOn()
    {
        $this->throwExceptionIfNotPluggedIn();
        $this->turnedOn = true;
        print 'Printer is on';
    }

    public function warmUp()
    {
        $this->throwExceptionIfNotPluggedIn();
        $this->throwExceptionIfNotTurnedOn();
        $this->warmedUp = true;
        print 'Printer is warmed up';

    }

    public function printPublication(Publication $publication, $count = 1)
    {
        $this->throwExceptionIfNotPluggedIn();
        $this->throwExceptionIfNotTurnedOn();
        $this->throwExceptionIfNotWarmedUp();
        $pageCount = $publication->getPageCount();
        $this->pageCounter += $pageCount * $count;

        return true;
    }

    public function turnOff()
    {
        $this->warmedUp = false;
        $this->turnedOn = false;
        print 'Printer shuts down';
    }

    public function unPlug()
    {
        $this->throwExceptionIfNotTurnedOn();
        $this->pluggedIn = false;
        print 'Printer disconnected';
    }

    public function getType()
    {
        return $this->type;
    }

    public function getPageCounter()
    {
        return $this->pageCounter;
    }
    
    public function setState(PrinterState $state)
    {
        // TODO: Implement setState() method.
    }
    
    public function getState($stateId)
    {
        // TODO: Implement getState() method.
    }

}