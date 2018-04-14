<?php

namespace classes;

use interfaces\Debugger;
use interfaces\Publication;

class Library {
    const DEBUG_MODE = 'log';
    protected $library = [];
    protected $rentalActions = [];
    protected $debugger;

    public function __construct(Debugger $debugger)
    {
        $this->debugger = $debugger;
    }

    public function addToLibrary(int $id, Publication $publication): void
    {
        $this->library[$id] = $publication;
        $this->debug('New publication in library: ' . $publication->getCategory());
    }

    public function rentPublication(Publication $publication, Member $member)
    {
        $publicationId = array_search($publication, $this->library);
        if (false === $publicationId) {
            throw new UnknownPublicationException();
        }

        if (!$this->isPublicationAvailable($publication)) {
            throw new PublicationNotAvailableException();
        }

        $rentalAction = new RentalAction($publication, $member);
        $this->rentalActions[] = $rentalAction;

        return $rentalAction;
    }

    public function returnPublication(Publication $publication): bool
    {
        foreach ($this->rentalActions as $rentalAction) {
            if ($rentalAction->getPublication() !== $publication) {
                continue;
            }

            if ($rentalAction->isReturned()) {
                continue;
            }

            $rentalAction->markPublicationReturned();
            return true;
        }

        return false;
    }

    public function isPublicationAvailable(Publication $publication): bool
    {
        foreach ($this->rentalActions as $rentalAction) {
            if ($rentalAction->getPublication() !== $publication) {
                continue;
            }

            if ($rentalAction->isReturned()) {
                continue;
            }

            return false;
        }

        return true;
    }

    protected function debug(string $message)
    {
        $this->debugger->debug($message);
    }


}