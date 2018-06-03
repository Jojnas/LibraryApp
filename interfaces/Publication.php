<?php

namespace interfaces;

use interfaces\visitor\Visitor;

interface Publication {
    public function open(): void;
    public function close(): void;
    public function setPageNumber(int $page): bool;
    public function getPageNumber(): int;
    public function getDailyRate(int $days): int;
    public function acceptVisitor(Visitor $visitor);
}