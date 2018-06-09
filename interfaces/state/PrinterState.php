<?php
namespace interfaces\state;

// STATE: allows abject to change its state and acts accordingly
// all states are encapsulated to classes (one class = one state)

use interfaces\Publication;

interface PrinterState
{
    public function plugIn();
    public function turnOn();
    public function warmUp();
    public function printPublication(Publication $publication, $count = 1);
    public function turnOff();
    public function unPlug();
}