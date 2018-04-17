<?php

namespace abstractFactory\implementation;

use interfaces\abstractFactory\TableFactory;

class PublicationList {
    protected $tableFactory = null;

    public function __construct(TableFactory $tableFactory)
    {
        $this->tableFactory = $tableFactory;
    }

    public function displayTable(array $data)
    {
        $table = $this->tableFactory->createTable();

        $header = $this->tableFactory->createHeader();
        $header->addCell($this->tableFactory->createCell('Category'));
        $header->addCell($this->tableFactory->createCell('Page count'));

        $table->setHeader($header);

        foreach ($data as $line) {
            $row = $this->tableFactory->createRow();
            foreach ($line as $field) {
                $cell = $this->tableFactory->createCell($field);
                $row->addCell($cell);
            }
            $table->addRow($row);
        }
        $table->show();
    }
}