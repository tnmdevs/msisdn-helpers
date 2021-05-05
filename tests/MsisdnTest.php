<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class MsisdnTest extends TestCase
{

    public function testValidNumber()
    {
        $this->assertTrue(msisdn('265888800900')->valid());
    }

    public function testInternationalize()
    {
        $this->assertEquals('265888800900', msisdn('888800900')->internationalized());
    }

    public function testCanParse()
    {
        $this->assertEquals('888800900', msisdn('265888800900')->toString());
    }

    public function testHumanise()
    {
        $this->assertEquals('0888800900', msisdn('888800900')->humanized());
    }


}
