<?php


namespace TNM\Msisdn\Operators;


use TNM\Msisdn\BaseMsisdn;

class DefaultMsisdn extends BaseMsisdn
{

    public function valid(): bool
    {
        return false;
    }

    public function length(): int
    {
        return 0;
    }

    public function operatorIds(): array
    {
        return [];
    }
}