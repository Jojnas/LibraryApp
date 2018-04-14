<?php

namespace classes;

use interfaces\Debugger;

class DebuggerLog implements Debugger {
    public function debug(string $message) {
        error_log($message . "\n", 3, './library.log');
    }
}