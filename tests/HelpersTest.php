<?php

namespace Tests;

use PHPUnit\Framework\TestCase;

class HelpersTest extends TestCase
{

    public function test_valid_tnm_number()
    {
        $this->assertTrue(is_valid_tnm_number('+265888325656'));
        $this->assertTrue(is_valid_tnm_number('+265318325656'));
        $this->assertTrue(is_valid_tnm_number('318325656'));
        $this->assertFalse(is_valid_tnm_number('31832565'));
        $this->assertFalse(is_valid_tnm_number('+265998325656'));
    }

    public function test_valid_malawian_number()
    {
        $this->assertTrue(is_valid_malawian_number('+265998325656'));
    }

}
