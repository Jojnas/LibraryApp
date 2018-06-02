<?php
namespace classes\command;

use classes\Book;
use interfaces\Publication;

// Command: puts all business requirements as objects so you do not need to change original classes (which is wrong)
// but create each process step in separate class which can be launched separately then
// e.g.
//$ebookProcess = [new CommandTranslation(), new CommandProofReading(), new CommandBookCover(), new CommandPrintToPdf()];
//$publisher = new Publisher();
//$publisher->addProcess('ebook', $ebookProcess);
//$book = new Book('PC', '400');
//$publisher->publish('ebook', $book);

class Publisher
{
    protected $processes = [];

    public function addProcess($name, $commands)
    {
        $this->processes[$name] = $commands;
    }

    public function publish($process, Publication $publication)
    {
        if (!isset($this->processes[$process])) {
            throw new BookPublishingException(
                "Process '" . $process . "' does not exist"
            );
        }

        printf('Starting process: %s', $process);
        foreach ($this->processes[$process] as $command) {
            $command->execute($publication);
        }
    }

}