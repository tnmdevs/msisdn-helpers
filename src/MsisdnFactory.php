<?php


namespace TNM\Msisdn;


use TNM\Msisdn\Operators\DefaultMsisdn;

class MsisdnFactory
{
    private string $msisdn;
    private Operator $operator;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->operator = new Operator();
    }

    public function make(): IMsisdn
    {
        $number = $this->stripCharacters();

        if (preg_match($this->operator->getRegexPattern(), $number, $matches)) {
            $operator = $this->operator->get($matches[0]);
            return new $operator($number);
        }

        return new DefaultMsisdn($number);
    }

    private function stripCharacters()
    {
        return preg_replace('/^(265|0)/', '', preg_replace('/\D/', '', $this->msisdn));
    }
}