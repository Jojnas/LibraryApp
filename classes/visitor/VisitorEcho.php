<?php
namespace classes\visitor;


use classes\Library;
use classes\Member;
use classes\RentalAction;
use interfaces\Publication;
use interfaces\visitor\Visitor;

class VisitorEcho implements Visitor
{
    public function visitLibrary(Library $library)
    {
        print 'Library';
    }

    public function visitRentalAction(RentalAction $rentalAction)
    {
        printf('Publication rented from %s', $rentalAction->getRentDate());

        if($rentalAction->isReturned()) {
            printf(' to %s', $rentalAction->getReturnDate());
        } else {
            print ' - not returned yet';
        }
    }

    public function visitPublication(Publication $publication)
    {
        printf(' - Category: %s', $publication->getCategory());
        printf(' - Page count: %d', $publication->getPageCount());
    }

    public function visitMember(Member $member)
    {
        printf(' - Reader: %s', $member->getName());
    }
}