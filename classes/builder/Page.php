<?php

namespace classes\builder;

class Page {
    protected $header;
    protected $body;
    protected $footer;

    public function setHeader($header): void
    {
        $this->header = $header;
    }


    public function getHeader()
    {
        return $this->header;
    }

    public function setBody($body): void
    {
        $this->page = $body;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setFooter($footer): void
    {
        $this->footer = $footer;
    }


    public function getFooter()
    {
        return $this->footer;
    }
}