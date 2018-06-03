<?php
namespace classes\visitor;


use classes\Library;
use classes\Member;
use classes\RentalAction;
use DOMDocument;
use interfaces\Publication;

class VisitorXMLExport
{
    protected $doc;
    protected $root;
    protected $currentAction = null;

    public function __construct()
    {
        $this->doc = new DOMDocument('1.0', 'UTF-8');
        $this->doc->formatOutput = true;
    }

    public function visitLibrary(Library $library)
    {
        $this->root = $this->doc->createElement('library');
        $this->doc->appendChild($this->root);
    }

    public function visitRentalAction(RentalAction $rentalAction)
    {
        $this->currentAction = $this->doc->createElement('rentalAction');
        $this->root->appendChild($this->currentAction);
        $this->currentAction->setAttribute('rentDate', $rentalAction->getRentDate());

        if ($rentalAction->isReturned()) {
            $this->currentAction->setAttribute('returnDate', $rentalAction->getReturnDate());
        }
    }

    public function visitPublication(Publication $publication)
    {
        $tag = $this->doc->createElement('publication');
        $tag->setAttribute('category', $publication->getCategory());
        $tag->setAttribute('pageCount', $publication->getPageCount());
        $this->currentAction->appendChild($tag);
    }

    public function visitMember(Member $member)
    {
        $tag = $this->doc->createElement('member');
        $tag->setAttribute('id', $member->getId());
        $tag->setAttribute('name', $member->getName());
        $this->currentAction->appendChild($tag);
    }

    public function asXML()
    {
        return $this->doc->saveXML();
    }

}