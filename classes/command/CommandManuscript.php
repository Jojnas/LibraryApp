<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandManuscript implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Received publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}