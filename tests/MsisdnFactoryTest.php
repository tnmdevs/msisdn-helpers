<?php
namespace Tests;

use PHPUnit\Framework\TestCase;
use TNM\Msisdn\AirtelMsisdn;
use TNM\Msisdn\TNMMsisdn;

class MsisdnFactoryTest extends TestCase
{
    public function test_parse_correct_msisdn_class_tnm(){
        $this->assertInstanceOf(TNMMsisdn::class,msisdn('+265 888 800 900'));
    }

    public function test_parse_correct_msisdn_class_airtel(){
        $this->assertInstanceOf(AirtelMsisdn::class,msisdn('+265 998 800 900'));
    }
}
