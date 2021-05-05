<?php


namespace TNM\Msisdn;


class Msisdn extends BaseMsisdn
{

    public function valid(): bool
    {
        return false;
    }

    public function length(): int
    {
        return 9;
    }

    public function operatorIds(): array
    {
        return ['88', '31'];
    }
}