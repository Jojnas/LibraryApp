<?php

namespace classes\decorator;


use interfaces\decorator\BookExtra;

class Appendix implements BookExtra {
    public function getAdditionalRate()
    {
        return 2;
    }

    public function getAdditionalPages()
    {
        return 30;
    }
}