<?php


namespace TNM\Msisdn\Operators;


use TNM\Msisdn\BaseMsisdn;

class AccessMsisdn extends BaseMsisdn
{

    public function length(): int
    {
        return 9;
    }

    public function operatorIds(): array
    {
        return ['212'];
    }
}