<?php


namespace TNM\Msisdn\Operators;


use TNM\Msisdn\IMsisdn;

class DefaultMsisdn implements IMsisdn
{
    public function humanize(): string
    {
        return '';
    }

    public function toString(): string
    {
        return '';
    }

    public function internationalize(bool $prefixed = false): string
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