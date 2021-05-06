<?php


namespace TNM\Msisdn;


use TNM\Msisdn\Operators\AccessMsisdn;
use TNM\Msisdn\Operators\AirtelMsisdn;
use TNM\Msisdn\Operators\DefaultMsisdn;
use TNM\Msisdn\Operators\MTLMsisdn;
use TNM\Msisdn\Operators\TNMMsisdn;

class MsisdnFactory
{
    private string $msisdn;
    private array $operatorIds = [
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
            case 'AIRTEL':
                return new AirtelMsisdn($this->msisdn);
            case 'ACCESS':
                return new AccessMsisdn($this->msisdn);
            case 'MTL':
                return new MTLMsisdn($this->msisdn);
            default:
                return new DefaultMsisdn($this->msisdn);
        }
    }

    private function getOperatorName(): ?string
    {
        foreach ($this->operatorIds as $operator => $ids)
            if ($this->matchesOperatorId($ids)) return $operator;

        return null;
    }

    private function matchesOperatorId(array $operatorIds): bool
    {
        foreach ($operatorIds as $id)
            if (preg_match("/^$id/", $this->msisdn)) return true;

        return false;
    }

    private function parse(string $msisdn): string
    {
        return preg_replace('/^(265|0)/', '', preg_replace('/\D/', '', $msisdn));
    }
}