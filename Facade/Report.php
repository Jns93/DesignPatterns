<?php

namespace Facade;

use Facade\ReportHeader;
use Facade\ReportBody;
use Facade\ReportFooter;

class Report
{
    public $header;
    public $body;
    public $footer;

    public function __construct()
    {

    }

    public function setHeader($header)
    {
        $this->header = $header->value;
    }

    public function setBody($body)
    {
        $this->body = $body->value;
    }

    public function setFooter($footer)
    {
        $this->footer = $footer->value;
    }

    public function generate()
    {
        return $html = "<div>{$this->header}</div>" . "<div>{$this->body}</div>" . "<div>{$this->footer}</div>";
    }
}