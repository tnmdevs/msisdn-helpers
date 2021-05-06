<?php
namespace TNM\Msisdn\Operators;


use TNM\Msisdn\BaseMsisdn;

class TNMMsisdn extends BaseMsisdn
{

    public function __construct(string $msisdn)
    {
        parent::__construct($msisdn);
    }
    public function length(): int
    {
        return 9;
    }

    public function operatorIds(): array
    {
        return ['88','31'];
    }
}