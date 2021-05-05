<?php
namespace TNM\Msisdn;


class TNMMsisdn extends BaseMsisdn
{

    public function length(): int
    {
        return 9;
    }

    public function operatorIds(): array
    {
        return ['88','31'];
    }
}