<?php

namespace classes;

use interfaces\Debugger;

class DebuggerEcho implements Debugger {
    public function debug(string $message) {
        print $message . "\n";
    }
}