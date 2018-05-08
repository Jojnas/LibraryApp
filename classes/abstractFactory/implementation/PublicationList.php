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
        $header->addCell('Category');
        $header->addCell('Page count');

        $table->setHeader($header);

        foreach ($data as $line) {
            $row = $this->tableFactory->createRow();
            foreach ($line as $field) {
                $row->addCell($field);
            }
        }
        $table->show();
    }
}