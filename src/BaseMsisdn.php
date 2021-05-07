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
        return $this->traceContainsFactory() && $this->traceContainsFactory('function');
    }

    private function traceContainsFactory(string $filterBy = 'class'): bool
    {
        $options = array_map(function (array $step) use ($filterBy) {
            if (array_key_exists($filterBy, $step)) return $step[$filterBy];
            return null;
        }, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        return !!preg_match("/(" . join('|', $options) . ")/", $filterBy === 'class' ? MsisdnFactory::class : 'make');
    }

}