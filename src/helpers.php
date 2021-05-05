<?php

if (!function_exists('vgs_phone_number')) {
    function vgs_phone_number($phone_number)
    {
        return '265' . subscriber_number($phone_number);
    }
}

if (!function_exists('humanized_phone_number')) {
    function humanized_phone_number($phone_number): string
    {
        return '0' . subscriber_number($phone_number);
    }
}

if (!function_exists('subscriber_number')) {
    function subscriber_number($phone_number)
    {
        return substr(preg_replace('/\D/', '', $phone_number), -9);
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
    function is_valid_tnm_number(string $number)
    {
        try {
            return preg_match("/^(0)(((88)\d{7})|(31\d{7}))$/", humanized_phone_number($number));
        } catch (Exception $e) {
            return false;
        }
    }
}

if (!function_exists('cbs_phone_number')) {
    function cbs_phone_number(string $msisdn): string
    {
        return subscriber_number($msisdn);
    }
}
