<?php

namespace TNM\Msisdn;

interface IMsisdn
{
    public function length(): int;

    public function operatorIds(): array;
}