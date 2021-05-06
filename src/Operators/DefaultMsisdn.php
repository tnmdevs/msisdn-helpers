<?php


namespace TNM\Msisdn\Operators;


use TNM\Msisdn\IMsisdn;

class DefaultMsisdn implements IMsisdn
{

    public function length(): int
    {
        return 0;
    }

    public function operatorIds(): array
    {
        return [];
    }

    public function humanize(): string
    {
        return '';
    }

    public function toString(): string
    {
        return '';
    }

    public function internationalize(): string
    {
        return '';
    }

    public function toCbsFormat(): string
    {
        return '';
    }

    public function toVgsFormat(): string
    {
        return '';
    }
}