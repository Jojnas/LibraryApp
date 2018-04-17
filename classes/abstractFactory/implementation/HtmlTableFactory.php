<?php


namespace abstractFactory\implementation;

use interfaces\abstractFactory\TableFactory;

class HtmlTableFactory implements TableFactory {
    public function createCell($content)
    {
        return new HtmlCell($content);
    }

    public function createHeader()
    {
        return new HtmlHeader();
    }

    public function createRow()
    {
        return new HtmlRow();
    }

    public function createTable()
    {
        return new HtmlTable();
    }
}