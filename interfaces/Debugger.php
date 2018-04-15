<?php

// design pattern Strategy - definovanie rodiny algoritmov, ktore su navzajom zamenitelne

namespace interfaces;

interface Debugger {
    public function debug(string $message);
}