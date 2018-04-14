<?php

namespace classes;

use interfaces\Publication;

class RentalAction {
    protected $publication;
    protected $member;
    protected $rentDate;
    protected $returnDate = null;

    public function __construct(Publication $publication, Member $member, ?string $date = null)
    {
        $this->publication = $publication;
        $this->member = $member;

        if (null === $date) {
            $date = date('Y-m-d H:i:s');
        }

        $this->rentDate = $date;
    }

    public function getPublication(): Publication
    {
        return $this->publication;
    }


    public function getMember(): Member
    {
        return $this->member;
    }

    public function getRentDate(): string
    {
        return $this->rentDate;
    }

    public function getReturnDate(): string
    {
        return $this->returnDate;
    }

    public function markPublicationReturned(?string $date = null): string
    {
        if (null === $date) {
            $date = date('Y-m-d H:i:s');
        }

        $this->returnDate = $date;
    }

    public function isReturned(): bool
    {
        return null !== $this->returnDate;
    }

}