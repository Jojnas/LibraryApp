<?php
namespace interfaces\observer;

use interfaces\Publication;

interface Printer
{
    public function turnOn();
    public function turnOff();
    public function printPublication(Publication $publication, $count = 1);
    public function getType();
    public function getPageCounter();
    public function check();
}