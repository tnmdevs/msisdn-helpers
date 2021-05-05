<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use TNM\Msisdn\TNMMsisdn;

class MsisdnFactoryTest extends TestCase
{
    public function test_parse_correct_msisdn_class(){
        $this->assertInstanceOf(TNMMsisdn::class,msisdn('+265 888 800 900'));
    }
}
