<?php

namespace classes;

use interfaces\Debugger;

class DebuggerLog implements Debugger {

    // Singleton in not standard way but used in real examples
    protected $logFile = null;
    private static $instances = [];

    public static function getInstance($logfile): string
    {
        if(!isset(self::$instances[$logfile])) {
            self::$instances[$logfile] = new self($logfile);
        }
        return self::$instances[$logfile];
    }

    protected function __construct($logFile)
    {
        $this->logFile = $logFile;
    }

    private function __clone()
    {
    }

    public function debug(string $message) {
        error_log($message . "\n", 3, $this->logFile);
    }
}