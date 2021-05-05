<?php


namespace TNM\Msisdn;


class MsisdnFactory
{
    private string $msisdn;
    private array $operators = [
        'TNM' => ['88', '31'],
        'AIRTEL' => ['99'],
        'ACCESS' => ['212'],
        'MTL' => ['1']
    ];

    public function __construct(string $msisdn)
    {
        $this->msisdn = $this->parse($msisdn);
    }

    public function make(): BaseMsisdn
    {

        switch ($this->getOperatorName()) {
            case 'TNM':
                return new TNMMsisdn($this->msisdn);
            default:
                return new Msisdn($this->msisdn);
        }
    }

    private function getOperatorName(): ?string
    {
        foreach ($this->operators as $operator => $ids) {
            if ($this->matchesOperatorId($ids)) return $operator;
        }
        return null;
    }

    private function matchesOperatorId(array $operatorIds): bool
    {
        foreach ($operatorIds as $id)
            if (substr($this->msisdn, 0, strlen($id)) === $id) return true;
        return false;
    }

    private function parse(string $msisdn): string
    {
        return preg_replace('/^(265|0)/', '', preg_replace('/\D/', '', $msisdn));
    }
}