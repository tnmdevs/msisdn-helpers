<?php

namespace TNM\Msisdn;

interface IMsisdn
{
    public function length(): int;

    public function operatorIds(): array;

    public function humanize(): string;

    public function toString(): string;

    public function internationalize(): string;

    public function toCbsFormat(): string;

    public function toVgsFormat(): string;

}