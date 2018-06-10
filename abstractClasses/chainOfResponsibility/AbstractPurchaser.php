<?php
namespace abstractClasses\chainofresponsibility;


use classes\chainofresponsibility\PublicationOffer;
use interfaces\chainofresponsibility\Purchaser;

class AbstractPurchaser implements Purchaser
{
    protected $limit = 0;
    protected $successor = null;

    public function processOffer(PublicationOffer $publicationOffer)
    {
        if ($publicationOffer->getPrice() > $this->limit) {
            if (null !== $this->successor) {
                return $this->successor->processOffer($publicationOffer);
            }
            return false;
        }
        printf('Offer accepted by %s', get_class($this));
        return true;
    }

    public function setSuccessor(Purchaser $successor)
    {
        $this->successor = $successor;
    }
}