<?php


namespace TNM\Msisdn;


class MsisdnFactory
{
    private string $msisdn;
    private Operator $operator;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $msisdn;
        $this->operator = new Operator();
    }

    /**
     * @throws MsisdnException
     */
    public function make(): IMsisdn
    {
        $number = $this->stripCharacters();

        if (preg_match($this->operator->getRegexPattern(), $number, $matches)) {
            if ($this->operator->getLength($matches[0]) === strlen($number)) {
                $operator = $this->operator->getType($matches[0]);
                return new $operator($number);
            }
        }

        throw new MsisdnException();
    }

    private function stripCharacters()
    {
        return preg_replace('/^(265|0)/', '', preg_replace('/\D/', '', $this->msisdn));
    }
}