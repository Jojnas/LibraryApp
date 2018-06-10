<?php
namespace interfaces\chainofresponsibility;

// Chain of responsibility : chains objects and pass request for processing to them one by one until
// it is process by any one of these objects

use classes\chainofresponsibility\PublicationOffer;

interface Purchaser
{
    public function processOffer(PublicationOffer $publicationOffer);
    public function setSuccessor(Purchaser $successor);
}