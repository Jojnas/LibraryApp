<?php
namespace classes\observer;

use interfaces\observer\Observable;
use interfaces\observer\Observer;
use interfaces\observer\Printer;


// it is with a state as it is holding an information when next control has to happen
// so we need another instance of this class in order to observe another object
class ObserverRegularCheck implements Observer
{
    protected $nextCheck = null;
    protected $interval;

    public function __construct($start, $interval)
    {
        $this->nextCheck = $start;
        $this->interval = $interval;
    }

    public function update(Observable $observable)
    {
        if (!$observable instanceof Printer) {
            return;
        }

        if ($observable->getPageCounter() >= $this->nextCheck) {
            $observable->check();
            $this->nextCheck += $this->interval;
        }
    }
}