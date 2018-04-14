<?php

namespace interfaces;

interface Publication {
    public function open(): void;
    public function close(): void;
    public function setPageNumber(int $page): bool;
    public function getPageNumber(): int;
    public function getDailyRate(int $days): int;
}