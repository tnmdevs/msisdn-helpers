<?php

namespace TNM\Msisdn;

interface IMsisdn
{
    public function humanize(): string;

    public function toString(): string;

    public function internationalize(bool $prefixed = false): string;

    public function toCbsFormat(): string;

    public function toVgsFormat(): string;

}