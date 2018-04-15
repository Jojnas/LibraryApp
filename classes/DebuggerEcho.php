<?php

namespace classes;

use interfaces\Debugger;

class DebuggerEcho implements Debugger
{
    // Singleton using static
    private static $instance = null;

    // Singleton - using protected constructor in order to force developers to user getInstance() instead creating new object
    protected function __construct()
    {
    }

    // Singleton - do not allow to clone object in other places but in this class
    private function __clone()
    {
    }

    public static function getInstance()
    {
        // Singleton
        if(null == self::$instance) {
            self::$instance = new self();

        }
        return self::$instance;
    }

    public function debug(string $message)
    {
        print $message . "\n";
    }
}