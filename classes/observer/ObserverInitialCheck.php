<?php
namespace classes\observer;

use interfaces\observer\Observable;
use interfaces\observer\Observer;
use interfaces\observer\Printer;


// it is without state hence may be used for watching more objects
class ObserverInitialCheck implements Observer
{
    protected $checkPageCounter;

    public function __construct($pageCounter = 10000)
    {
        $this->checkPageCounter = $pageCounter;
    }

    public function update(Observable $observable)
    {
        if (!$observable instanceof Printer) {
            return;
        }

        if ($observable->getPageCounter() >= $this->checkPageCounter) {
            printf('Required first control after %d printed pages.\n', $this->checkPageCounter);
            $observable->detach($this);
        }
    }
}