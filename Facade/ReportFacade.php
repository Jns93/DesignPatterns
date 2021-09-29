<?php

namespace Facade;

use Facade\Report;
use Facade\ReportHeader;
use Facade\ReportBody;
use Facade\ReportFooter;

class ReportFacade 
{
    public $report;

    public function __construct($header, $body, $footer)
    {
        $this->report = new Report();
        $this->report->setHeader(new ReportHeader($header));
        $this->report->setBody(new ReportBody($body));
        $this->report->setFooter(new ReportFooter($footer));
    }

    public function generate()
    {
        return $this->report->generate();
    }
}