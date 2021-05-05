<?php

namespace TNM\Msisdn;


use Exception;

class Msisdn
{
    private string $msisdn;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $this->parse($msisdn);
    }

    private function parse(string $msisdn): string
    {
        return substr(preg_replace('/\D/', '', $msisdn), -9);
    }

    public function validTnmNumber(): bool
    {
        try {
            return preg_match("/^(0)(((88)\d{7})|(31\d{7}))$/", $this->msisdn);
        } catch (Exception $e) {
            return false;
        }
    }

    public function toCbsFormat(): string
    {
        return $this->msisdn;
    }

    public function humanized(): string
    {
        return '0' . $this->msisdn;
    }

    public function toString(): string
    {
        return $this->msisdn;
    }

    public function internationalized(): string
    {
        return '265' . $this->msisdn;
    }
}
