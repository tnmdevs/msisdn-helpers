<?php


namespace TNM\Msisdn;


abstract class BaseMsisdn implements IMsisdn
{
    use Formatters;

    private string $msisdn;

    /**
     * @throws MsisdnException
     */
    public function __construct(string $msisdn)
    {
        if (!$this->isCalledFromFactory())
            throw new MsisdnException(sprintf('MSISDN can only be initialized by %s\'s make() method', MsisdnFactory::class));

        $this->msisdn = $msisdn;
    }

    private function isCalledFromFactory(): bool
    {
        return $this->arrayFirst(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS), function ($value) {
            return $this->arrayKeysExist(['class', 'function'], $value)
                && $value['function'] === 'make'
                && $value['class'] === MsisdnFactory::class;
        });
    }

    private function arrayKeysExist(array $arrayKeys, array $array): bool
    {
        foreach ($arrayKeys as $key)
            if (!in_array($key, array_keys($array))) return false;

        return true;
    }

    private function arrayFirst(array $array, callable $callback): bool
    {
        foreach ($array as $value)
            if ($callback($value)) return true;

        return false;
    }

}