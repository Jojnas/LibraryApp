<?php

namespace abstractClasses;

use interfaces\bridge\Storage;
use interfaces\Debugger;
use interfaces\Publication;

abstract class AbstractLibrary {
    protected $rentalActions = [];
    protected $debugger;
    protected $storage;

    public function __construct(Debugger $debugger, Storage $storage)
    {
        $this->debugger = $debugger;
        $this->storage = $storage;
    }

    public function rentPublication(Publication $publication, Member $member)
    {
        $publicationId = array_search($publication, $this->getPublications());
        if (false === $publicationId) {
            throw new UnknownPublicationException();
        }

        if (!$this->isPublicationAvailable($publication)) {
            throw new PublicationNotAvailableException();
        }

        $rentalAction = new RentalAction($publication, $member);
        $this->rentalActions[] = $rentalAction;

        $this->debug($member->getName() . 'has borrowed a publication: ' . $publication->getCategory());

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
            $this->debug($rentalAction->getMember()->getName() . ' returned publication: ' . $publication->getCategory());
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

    public function generateId()
    {
        $publications = $this->getPublications();
        return 'PUBLICATION-' . count($publications);
    }

    public function getPublications()
    {
        return $this->storage->fetchPublication();
    }

    protected function debug(string $message)
    {
        $this->debugger->debug($message);
    }

    abstract public function addToLibrary($id, Publication $publication);


}