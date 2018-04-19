<?php


// DECORATOR : pridavanie funkcionality za behu programu...flexibilna alternativa k vytvaraniu potomkov tried

namespace interfaces\decorator;


interface BookExtra {
    public function getAdditionalRate();
    public function getAdditionalPages();
}