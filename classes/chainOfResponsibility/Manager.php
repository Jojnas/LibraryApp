<?php
namespace classes\chainofresponsibility;


use abstractClasses\chainofresponsibility\AbstractPurchaser;

class Manager extends AbstractPurchaser
{
    protected $limit = 500;
}