<?php

namespace classes\abstractFactory\cliImplementation;


use abstractFactory\implementation\HtmlCell;
use abstractFactory\implementation\HtmlHeader;
use abstractFactory\implementation\HtmlRow;
use abstractFactory\implementation\HtmlTable;
use interfaces\abstractFactory\TableFactory;

class HtmlTableFactory implements TableFactory {
    private $cell = null;

    public function createCell()
    {
        if (null == $this->cell) {
            $this->cell = new TextCell();
        }
        return $this->cell;
    }

    public function createHeader()
    {
        $header = new TextHeader($this->createCell());
        return $header;
    }

    public function createRow()
    {
        $row = new TextRow($this->createCell());
        return $row;
    }

    public function createTable()
    {
        return new TextTable();
    }
}