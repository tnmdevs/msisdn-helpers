<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TNM\Msisdn\Operators\AccessMsisdn;
use TNM\Msisdn\Operators\AirtelMsisdn;
use TNM\Msisdn\Operators\DefaultMsisdn;
use TNM\Msisdn\Operators\MTLMsisdn;
use TNM\Msisdn\Operators\TNMMsisdn;


class MsisdnFactoryTest extends TestCase
{
    public function test_parse_correct_msisdn_class_tnm()
    {
        $this->assertInstanceOf(TNMMsisdn::class, msisdn('+265 888 800 900'));
    }

    public function test_parse_correct_msisdn_class_default()
    {

        $this->assertInstanceOf(DefaultMsisdn::class, msisdn('+265 88080 800 900-900'));
    }

    public function test_parse_correct_msisdn_class_airtel()
    {
        $this->assertInstanceOf(AirtelMsisdn::class, msisdn('+265 998 800 900'));
    }

    public function test_parse_correct_msisdn_class_access()
    {
        $this->assertInstanceOf(AccessMsisdn::class, msisdn('+265 212 800 900'));
    }

    public function test_parse_correct_msisdn_class_mtl()
    {
        $this->assertInstanceOf(MTLMsisdn::class, msisdn('+265 1 800 900'));
    }
}
