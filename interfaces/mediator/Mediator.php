<?php

namespace interfaces\mediator;

// Mediator : ensuring communication between objects which are not in direct interaction
// changes relationship from m:n to 1:n

use abstractClasses\mediator\AbstractEmployee;

interface Mediator
{
    public function send($message, AbstractEmployee $employee);
}