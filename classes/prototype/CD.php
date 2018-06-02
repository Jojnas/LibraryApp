<?php

// Prototype : the biggest issue in this design pattern is to correctly use __clone because you want a
// deep copy of objects not shallow copies

namespace classes\prototype;

class CD
{
    protected $track = 1;

    public function getTrack(): int
    {
        return $this->track;
    }

    public function setTrack(int $track): void
    {
        $this->track = $track;
    }
}