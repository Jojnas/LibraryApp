<?php

namespace classes\mediator;


use abstractClasses\mediator\AbstractEmployee;

class Employee extends AbstractEmployee
{
    public function receive($message)
    {
        printf('<%s> Message received: %s', $this->getId(), $message);
    }
}