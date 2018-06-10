<?php
namespace classes\chainofresponsibility;


use interfaces\chainofresponsibility\Purchaser;

class MedicalPurchaser implements Purchaser
{
    protected $successor = null;

    public function setSuccessor(Purchaser $successor)
    {
        $this->successor = $successor;
    }

    public function processOffer(PublicationOffer $publicationOffer)
    {
        if ('Medicine' != $publicationOffer->getPublication()->getCategory()) {
            if (null !== $this->successor) {
                return $this->successor->processOffer($publicationOffer);
            }
            return false;
        }
        printf('Offer accepted by %s', get_class($this));
        return true;
    }
}