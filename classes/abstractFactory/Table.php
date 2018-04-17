<?php

namespace abstractFactory;

abstract class Table {
    protected $rows = [];
    protected $header = null;

    public function addRow(Row $row): void
    {
        $this->rows[] = $row;
    }

    public function setHeader(Header $header): void
    {
        $this->header = $header;
    }

    abstract public function show();


}