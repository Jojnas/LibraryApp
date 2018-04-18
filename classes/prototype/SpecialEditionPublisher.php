<?php

namespace classes\prototype;

use interfaces\Publication;

// Prototype : other instances are being created from prototype so we do not need to create separate
// factories for each special book edition

class SpecialEditionPublisher {
    protected $prototypes = [];

    public function addSpecialEdtion($edition, Publication $publication)
    {
        $this->prototypes[$edition] = $publication;
    }

    public function publishPublication($edition)
    {
        if(!isset($this->prototypes[$edition])) {
            throw new UnknownSpecialEditionException('No prototype for special edition: ' . $edition);
        }

        return clone $this->prototypes[$edition];
    }
}