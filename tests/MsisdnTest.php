<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class MsisdnTest extends TestCase
{

    public function testInternationalize()
    {
        $this->assertEquals('265888800900', msisdn('888800900')->internationalize());
        $this->assertEquals('+265888800900', msisdn('888800900')->internationalize(true));
    }

    public function testCanParse()
    {
        $this->assertEquals('888800900', msisdn('265888800900')->toString());
    }

    public function testHumanise()
    {
        $this->assertEquals('0888800900', msisdn('888800900')->humanize());
    }


}
