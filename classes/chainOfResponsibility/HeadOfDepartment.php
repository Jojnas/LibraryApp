<?php
namespace classes\chainofresponsibility;


use abstractClasses\chainofresponsibility\AbstractPurchaser;

class HeadOfDepartment extends AbstractPurchaser
{
    protected $limit = 1000;
}