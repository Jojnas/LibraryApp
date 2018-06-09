<?php
namespace abstractClasses\state;


use http\Exception\BadMethodCallException;
use interfaces\state\Printer;
use interfaces\state\PrinterState;

abstract class AbstractPrinterState implements PrinterState
{
    protected $printer;

    public function __construct(Printer $printer)
    {
        $this->printer = $printer;
    }

    protected function throwExceptionIfNotTurnedOn()
    {
        throw new BadMethodCallException(
            'Printer was not turned on'
        );
    }

    protected function throwExceptionIfNotPluggedIn()
    {
        throw new BadMethodCallException(
            'Printer is not plugged in'
        );
    }

    protected function throwNotPossibleException()
    {
        throw new BadMethodCallException(
            'Not possible'
        );
    }

    protected function throwExceptionIfAlreadyPluggedIn()
    {
        throw new BadMethodCallException(
            'Printer already plugged in'
        );
    }

    protected function throwExceptionIfAlreadyTurnedOn()
    {
        throw new BadMethodCallException(
            'Printer already turned on'
        );
    }

    protected function throwExceptionIfAlreadyWarmedUp()
    {
        throw new BadMethodCallException(
            'Printer already warmed up'
        );
    }

    protected function throwExceptionIfPrinterRunning()
    {
        throw new BadMethodCallException(
            'Printer is still running'
        );
    }




}