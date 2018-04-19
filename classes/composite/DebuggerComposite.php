<?php

namespace classes\composite;

// Composite: connects more objects into tree structure and behave like one object

use interfaces\Debugger;

class DebuggerComposite implements Debugger
{
    protected $debuggers = [];

    public function addDebugger(Debugger $debugger)
    {
        $this->debuggers[] = $debugger;
    }

    public function debug(string $message): void
    {
        foreach ($this->debuggers as $debugger) {
            $debugger->debug($message);
        }
    }

    public function removeDebugger(Debugger $debugger): bool
    {
        $key = array_search($debugger, $this->debuggers);
        if (false === $key) {
            return false;
        }
        unset($this->debuggers[$key]);
        return true;
    }

}