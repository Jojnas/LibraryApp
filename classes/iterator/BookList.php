<?php
namespace classes\iterator;

// ITERATOR: a class will be able to traverse the elements of another class
// iterate over objects without publishing their basic structure
// there is a need to implement Iterator interface (for arrays ArrayIterator)


use Iterator;

class BookList implements Iterator
{
    protected $bookDefinitions = [];
    protected $books = [];
    protected $position = 0;

    public function __construct($csvFile)
    {
        if (!file_exists($csvFile)) {
            throw new IOException();
        }

        $fp = fopen($csvFile, 'r');

        while (false != $line = fgetcsv($fp, 1024, ':')) {
            $this->bookDefinitions[] = [
                'category' => $line[0],
                'pageCount' => $line[1],
            ];
        }
    }

//    public function getBook($position)
//    {
//        if ($position > count($this->bookDefinitions)) {
//            throw new IndexOutOfBoundsException();
//        }
//
//        if (!isset($this->books[$position])) {
//            $this->books[$position] = new Book(
//                $this->bookDefinitions[$position]['category'],
//                $this->bookDefinitions[$position]['pagecount']
//            );
//        }
//
//        return $this->books[$position];
//
//    }

    public function countBooks()
    {
        return count($this->bookDefinitions);
    }

    public function current()
    {
        if (!isset($this->books[$this->position])) {
            $this->books[$this->position] = new Book(
                $this->bookDefinitions[$this->position]['category'],
                $this->bookDefinitions[$this->position]['pagecount']
            );
        }

        return $this->books[$this->position];
    }

    public function key()
    {
        return $this->position;
    }

    public function next()
    {
        $this->position++;
    }

    public function rewind()
    {
        $this->position = 0;
    }

    public function valid()
    {
        if ($this->position < count($this->bookDefinitions)) {
            return true;
        }
        return false;
    }

}