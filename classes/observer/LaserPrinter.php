<?php

namespace classes\observer;


use interfaces\observer\Observable;
use interfaces\observer\Observer;
use interfaces\observer\Printer;
use interfaces\Publication;

class LaserPrinter implements Printer, Observable
{
    protected $turnedOn = false;
    protected $type = null;
    protected $pageCounter = 0;
    protected $observers = [];

    public function __construct($type)
    {
        $this->type = $type;
    }

    public function check()
    {

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