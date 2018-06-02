<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandProofReading implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Language correction of publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}