<?php
namespace classes\chainofresponsibility;


use abstractClasses\chainofresponsibility\AbstractPurchaser;

class President extends AbstractPurchaser
{
    protected $limit = 2000;
}