<?php

namespace classes;

use interfaces\visitor\Visitor;

class Member {
    protected $id;
    protected $name;

    public function __construct(int $id, string $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function acceptVisitor(Visitor $visitor)
    {
        $visitor->visitMember($this);
    }
}