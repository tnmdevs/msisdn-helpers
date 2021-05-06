<?php


namespace TNM\Msisdn;


use TNM\Msisdn\Operators\DefaultMsisdn;

class MsisdnFactory
{
    private string $msisdn;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $this->parse($msisdn);
    }

    public function make(): BaseMsisdn
    {
        foreach (Operators::all() as $id => $operator)
            if (preg_match("/^$id/", $this->msisdn)) return new $operator($this->msisdn);

        return new DefaultMsisdn($this->msisdn);
    }

    private function parse(string $msisdn): string
    {
        return preg_replace('/^(265|0)/', '', preg_replace('/\D/', '', $msisdn));
    }
}