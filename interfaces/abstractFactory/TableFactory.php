<?php

namespace interfaces\abstractFactory;

interface TableFactory {
//    removing $content due to Flyweight
//    public function createCell($content);
    public function createCell();
    public function createRow();
    public function createHeader();
    public function createTable();
}