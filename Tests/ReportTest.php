<?php
// -------------- ANTES (SEM FACEDE)
// namespace Tests;

// use PHPUnit\Framework\TestCase;
// use Facade\Report;
// use Facade\ReportHeader;
// use Facade\ReportBody;
// use Facade\ReportFooter;


// class ReportTest extends TestCase
// {
//     public function testDeveGerarRelatorio()
//     {
//         $report = new Report();
//         $report->setHeader(new ReportHeader("HEADER"));
//         $report->setBody(new ReportBody("BODY"));
//         $report->setFooter(new ReportFooter("FOOTER"));
//         $html = $report->generate();

//         $this->assertEquals($html, '<div>HEADER</div><div>BODY</div><div>FOOTER</div>');
//     }
// }

// ---------------- DEPOIS (COM FACADE)

namespace Tests;

use PHPUnit\Framework\TestCase;
use Facade\ReportFacade;


class ReportTest extends TestCase
{
    public function testDeveGerarRelatorio()
    {
        $facade = new ReportFacade("HEADER", 'BODY', 'FOOTER');
        $html = $facade->generate();
        $this->assertEquals($html, '<div>HEADER</div><div>BODY</div><div>FOOTER</div>');
    }
}