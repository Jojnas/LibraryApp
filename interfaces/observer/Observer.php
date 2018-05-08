<?php
namespace interfaces\observer;

// Observer is being used for watching changes of state in other classes (subjects)

interface Observer
{
    public function update(Observable $observable);
}