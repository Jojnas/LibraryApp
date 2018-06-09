<?php
namespace interfaces\state;

// Solution without STATE where most methods contains if blocks and if a new requirement comes
// we need to adjust already created methods which is against OOP principles

use interfaces\Publication;

interface Printer
{
    const STATE_OFFLINE = 0;
    const STATE_PLUGGED_IN = 1;
    const STATE_TURNED_ON = 2;
    const STATE_WARMED_UP = 3;

    public function setState(PrinterState $state);
    public function getState($stateId);
    
    public function plugIn();
    public function unPlug();
    public function turnOn();
    public function turnOff();
    public function warmUp();
    public function printPublication(Publication $publication, $count = 1);
    public function getType();
    public function getPageCounter();
}