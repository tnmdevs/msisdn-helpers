<?php


namespace TNM\Msisdn;


use TNM\Msisdn\Operators\AccessMsisdn;
use TNM\Msisdn\Operators\AirtelMsisdn;
use TNM\Msisdn\Operators\MTLMsisdn;
use TNM\Msisdn\Operators\TNMMsisdn;

class Operators
{
    private static array $operators = [
        '88' => TNMMsisdn::class,
        '31' => TNMMsisdn::class,
        '99' => AirtelMsisdn::class,
        '212' => AccessMsisdn::class,
        '1' => MTLMsisdn::class
    ];

    /**
     * @return array|string[]
     */
    public static function all(): array
    {
        return self::$operators;
    }
}