<?php
namespace classes\facade;


class IdGenerator
{
    private static $instance = null;
    private $currentId = 1;

    public static function getInstance()
    {
        if (null == self::$instance){
            self::$instance = new self();
        }

        return self::$instance;
    }

    protected function __construct()
    {
    }

    private function __clone()
    {
    }

    public function generateId()
    {
        return 'PUBLICATION-' . $this->currentId++;
    }
}