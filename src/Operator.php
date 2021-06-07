<?php


namespace TNM\Msisdn;


use TNM\Msisdn\Operators\AccessMsisdn;
use TNM\Msisdn\Operators\AirtelMsisdn;
use TNM\Msisdn\Operators\MTLMsisdn;
use TNM\Msisdn\Operators\TNMMsisdn;

class Operator
{
    private array $operators = [
        '88' => ['type' => TNMMsisdn::class, 'length' => 9],
        '31' => ['type' => TNMMsisdn::class, 'length' => 9],
        '99' => ['type' => AirtelMsisdn::class, 'length' => 9],
        '98' => ['type' => AirtelMsisdn::class, 'length' => 9],
        '212' => ['type' => AccessMsisdn::class, 'length' => 9],
        '1' => ['type' => MTLMsisdn::class, 'length' => 7],
    ];

    /**
     * @return array|string[]
     */
    public function all(): array
    {
        return $this->operators;
    }

    public function getType(string $key): string
    {
        return $this->operators[$key]['type'];
    }

    public function getRegexPattern(): string
    {
        return "/^(" . join('|', array_keys($this->all())) . ")/";
    }

    public function getLength(string $key)
    {
        return $this->operators[$key]['length'];
    }
}
