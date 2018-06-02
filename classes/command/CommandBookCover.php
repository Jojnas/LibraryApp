<?php
namespace classes\command;


use interfaces\command\BookPublishingCommand;
use interfaces\Publication;

class CommandBookCover implements BookPublishingCommand
{
    public function execute(Publication $publication)
    {
        printf('Preparation of book cover for publication of category %s, %d pages',
            $publication->getCategory(),
            $publication->getPageCount()
        );
    }
}