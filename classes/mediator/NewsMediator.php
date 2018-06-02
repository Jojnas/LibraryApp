<?php

namespace classes\mediator;


use abstractClasses\mediator\AbstractEmployee;
use interfaces\mediator\Mediator;

class NewsMediator implements Mediator
{
    protected $employees = [];

    public function registerEmployee(AbstractEmployee $employee)
    {
        $this->employees[] = $employee;
    }

    public function send($message, AbstractEmployee $sender)
    {
        foreach ($this->employees as $employee) {
            if ($employee !== $sender) {
                $employee->recieve($message);
            }
        }
    }
}