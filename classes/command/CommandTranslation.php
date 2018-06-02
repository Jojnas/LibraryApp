<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandTranslation implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Translation of publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}