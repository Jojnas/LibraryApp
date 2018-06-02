<?php

namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandPrint implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Printing publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}