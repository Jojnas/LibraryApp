<?php

namespace interfaces\command;


use interfaces\Publication;

interface BookPublishingCommand
{
    public function execute(Publication $publication);
}