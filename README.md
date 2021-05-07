# Malawi Phone Number Helpers

Phone number formatters and validator for all Mobile Networks in Malawi

## How to install 

```terminal 
composer require tnmdev/msisdn-helpers
```

## Creating new number

MSISDN factory creates an instance of interface IMSISDN for any operator
`(new MsisdnFactory('0888800900'))->make();` of `TNM\Msisdn` namespace

The `make` method returns an instance of MSISDN interface or throws `MsisdnException` of `TNM\Msisdn` namespace
if the value passed is not a valid Malawian phone number

You can also use `msisdn('+265999900900')` which aliases to the MSISDN factory

The factory strips out all spaces and special characters, so any of the following formats
will be recognised as Malawian phone numbers: 0888800900, 265888800900, +265888800900, +265 888 800 900, +265 888 80 09 00, 0888-800-900,

FAN FACT: Even if you put a movie within the phone number, it will be parsed as a valid number 😛

## Formatters

### Humanize
```php
msisdn('265-888-800-900')->humanize()
// returns 0888800900
```
### Internationalize
```php
msisdn('01800900')->internationalize()
// returns 2651800900
```
### Base string
```php
msisdn('0999800900')->toString()
// returns 999800900
```

## Validators

### Valid TNM Number 
```php
is_valid_tnm_number('01800900')
// returns false 
```
### Valid Malawian Number 
```php
is_valid_malawian_number('01800900')
// returns true
```

### Valid MTL Number
```php
msisdn('0999800900') instanceof TNM\Msisdn\MTLMsisdn
// return false

msisdn('01800900') instanceof TNM\Msisdn\MTLMsisdn
// return true
```
With the method above, you can validate other classes: `TNM\Msisdn\AirtelMsisdn` and `TNM\Msisdn\AccessMsisdn`

## Testing

```php
phpunit tests
```
