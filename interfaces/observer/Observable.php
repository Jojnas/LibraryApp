<?php
namespace interfaces\observer;

// Observer consists of Observer and Subject..below example is Subject...something which is being to be watched by Observer

interface Observable
{
    public function attach(Observer $observer);
    public function detach(Observer $observer);
    public function notify();
}