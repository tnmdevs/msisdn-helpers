<?php


namespace TNM\Msisdn;


trait Formatters
{
    public function humanize(): string
    {
        return sprintf('0%s', $this->msisdn);
    }

    public function toString(): string
    {
        return $this->msisdn;
    }

    public function internationalize(): string
    {
        return sprintf('265%s', $this->msisdn);
    }

    public function toCbsFormat(): string
    {
        return $this->toString();
    }

    public function toVgsFormat(): string
    {
        return $this->internationalize();
    }
}