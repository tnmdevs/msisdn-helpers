<?php

use TNM\Msisdn\BaseMsisdn;
use TNM\Msisdn\MsisdnFactory;
use TNM\Msisdn\Operators\TNMMsisdn;

if (!function_exists('vgs_phone_number')) {
    function vgs_phone_number($phone_number): string
    {
        return msisdn($phone_number)->internationalized();
    }
}

if (!function_exists('humanized_phone_number')) {
    function humanized_phone_number($phone_number): string
    {
        return msisdn($phone_number)->humanized();
    }
}

if (!function_exists('subscriber_number')) {
    function subscriber_number($phone_number):string
    {
        return msisdn($phone_number)->toString();
    }
}

if (!function_exists('generate_key')) {
    function generate_key(int $length = 10, bool $numeric = false): string
    {
        $characters = $numeric ? "0123456789" : '23456789ABCDEFGHJKLMNPQRSTUVWXYZ';

        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}

if (!function_exists('is_valid_tnm_number')) {
    function is_valid_tnm_number(string $number): bool
    {
        $msisdn=msisdn($number);
        return $msisdn->valid() && $msisdn instanceof TNMMsisdn;
    }
}

if (!function_exists('cbs_phone_number')) {
    function cbs_phone_number(string $msisdn): string
    {
        return msisdn($msisdn)->toString();
    }
}


if (!function_exists('msisdn')) {
    function msisdn(string $msisdn) : BaseMsisdn
    {
        return (new MsisdnFactory($msisdn))->make();
    }
}
