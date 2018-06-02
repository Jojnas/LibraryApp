<?php

namespace abstractClasses\templateMethod;

use interfaces\observer\Observable;
use interfaces\observer\Observer;
use interfaces\observer\Printer;
use interfaces\Publication;

// TEMPLATE METHOD: defines interface of algorithms in a method (in this case method check())
// and leave implementation of each step to children

abstract class AbstractPrinter implements Printer, Observable
{
    protected $turnedOn = false;
    protected $type = null;
    protected $pageCounter = 0;
    protected $observers = [];
    protected $paperAmount = 150;

    public function __construct($type)
    {
        $this->type = $type;
    }

    abstract protected function replaceCartridge();
    abstract protected function checkPrintingParts();
    abstract protected function isLowPaperAmount();

    public function addPaper()
    {
        printf('Supplying %d sheets to storage of papers.', 1000 - $this->paperAmount);
        $this->paperAmount = 1000;
    }

    final public function check()
    {
        printf('Control of printer %s running', $this->type);
        $this->replaceCartridge();
        $this->checkPrintingParts();
        if ($this->isLowPaperAmount()) {
            $this->addPaper();
        } else {
            print 'Enough paper';
        }
    }

    public function turnOn()
    {
        $this->turnedOn = true;
    }

    public function turnOff()
    {
        $this->turnedOn = false;
    }

    public function getType()
    {
        return $this->type;
    }

    public function printPublication(Publication $publication, $count = 1)
    {
        if (true !== $this->turnedOn) {
            return false;
        }

        $pageCount = $publication->getPageCount();
        $this->pageCounter += $pageCount * $count;
        $this->notify();

        return true;
    }

    public function getPageCounter()
    {
        return $this->pageCounter;
    }

    public function attach(Observer $observer)
    {
        $this->observers[] = $observer;
    }

    public function detach(Observer $observer)
    {
        $this->observers = array_diff($this->observers, [$observer]);
    }

    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }
}