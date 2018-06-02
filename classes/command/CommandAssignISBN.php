<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandAssignISBN implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Assigning ISBN to publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}