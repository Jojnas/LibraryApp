<?php
namespace interfaces\visitor;

// VISITOR: adds new operation to object structure without changing the of object structure. Operations are placed to new class
// method visit() is being added to new classes and acceptVisitor() to old classes from which we want to get data
// (this breaks the rules of encapsulation - never change the class once it is programmed - however it is new method so it is
// not a change of existing methods)

use classes\Library;
use classes\Member;
use classes\RentalAction;
use interfaces\Publication;

interface Visitor
{
    public function visitLibrary(Library $library);
    public function visitRentalAction(RentalAction $rentalAction);
    public function visitPublication(Publication $publication);
    public function visitMember(Member $member);
}