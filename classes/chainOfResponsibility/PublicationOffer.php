<?php
namespace classes\chainofresponsibility;


use interfaces\Publication;

class PublicationOffer
{
    protected $price;
    protected $publication;

    public function __construct($price, Publication $publication)
    {
        $this->price = $price;
        $this->publication = $publication;
        printf('Offer worth %d EUR', $this->price);
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function getPublication()
    {
        return $this->publication;
    }

}