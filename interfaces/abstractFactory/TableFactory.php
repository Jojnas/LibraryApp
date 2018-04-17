<?php

namespace interfaces\abstractFactory;

interface TableFactory {
    public function createCell($content);
    public function createRow();
    public function createHeader();
    public function createTable();
}