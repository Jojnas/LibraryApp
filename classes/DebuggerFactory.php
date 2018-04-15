<?php

namespace classes;

// Mixing Singleton and Factory Method

class DebuggerFactory
{
    public static function createDebugger(string $type, string $logFile = null)
    {
        switch (strtolower($type)) {
            case 'log':
                return DebuggerLog::getInstance($logFile);
            case 'echo':
                return DebuggerEcho::getInstance();
            default:
                throw new UnknownDebuggerException();
        }
    }
}