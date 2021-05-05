<?php


namespace TNM\Msisdn;


abstract class BaseMsisdn
{
    private string $msisdn;

    public function __construct(string $msisdn)
    {
        $this->msisdn = $this->parse($msisdn);
    }

    private function parse(string $msisdn): string
    {
        return substr(preg_replace('/\D/', '', $msisdn), -1 * $this->length());
    }

    private function matchesOperatorId(): bool
    {
        foreach ($this->operatorIds() as $id)
            if (substr($this->msisdn, 0, strlen($id)) === $id) return true;
        return false;
    }

    public function valid(): bool
    {
        return $this->matchesOperatorId() && is_numeric($this->msisdn) && strlen($this->msisdn) === $this->length();
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

    abstract public function length(): int;

    abstract public function operatorIds(): array;
}