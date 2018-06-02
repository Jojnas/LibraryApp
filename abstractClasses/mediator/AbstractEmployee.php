<?php

namespace abstractClasses\mediator;


use interfaces\mediator\Mediator;

abstract class AbstractEmployee
{
    protected $id;
    protected $mediator;

    public function __construct($id, Mediator $mediator)
    {
        $this->setId($id);
        $this->setMediator($mediator);
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setMediator(Mediator $mediator): void
    {
        $this->mediator = $mediator;
    }

    public function getMediator()
    {
        return $this->mediator;
    }

    public function send($message)
    {
        $this->mediator->send($message, $this);
    }

    public abstract function receive($message);

}