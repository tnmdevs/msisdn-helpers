<?php


namespace TNM\Msisdn\Operators;


use TNM\Msisdn\BaseMsisdn;

class MTLMsisdn extends BaseMsisdn
{

    public function length(): int
    {
        return 7;
    }

    public function operatorIds(): array
    {
        return ['1'];
    }
}