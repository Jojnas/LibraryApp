<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandPrintToPdf implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Printing publication of category %s, %d pages to a PDF file',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}