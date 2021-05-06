<?php


namespace TNM\Msisdn;


abstract class BaseMsisdn implements IMsisdn
{
    private string $msisdn;

    /**
     * @throws MsisdnException
     */
    protected function __construct(string $msisdn)
    {
        if (!$this->isCalledFromFactory())
            throw new MsisdnException(sprintf('MSISDN can only be initialized by %s', MsisdnFactory::class));

        $this->msisdn = $msisdn;
    }

    private function isCalledFromFactory(): bool
    {
        return $this->traceContainsFactoryClass() && $this->traceContainsFactoryMethod();
    }

    private function traceContainsFactoryClass(): bool
    {
        $classes = array_map(function (array $step) {
            if (array_key_exists('class', $step)) return $step['class'];
            return null;
        }, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        return !!preg_match("/(" . join('|', $classes) . ")/", MsisdnFactory::class);
    }

    private function traceContainsFactoryMethod(): bool
    {
        $methods = array_map(function (array $step) {
            if (array_key_exists('function', $step)) return $step['function'];
            return null;
        }, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
        return !!preg_match("/(" . join('|', $methods) . ")/", 'make');
    }

    public function humanize(): string
    {
        return sprintf('0%s', $this->msisdn);
    }

    public function toString(): string
    {
        return $this->msisdn;
    }

    public function internationalize(): string
    {
        return sprintf('265%s', $this->msisdn);
    }

    public function toCbsFormat(): string
    {
        return $this->toString();
    }

    public function toVgsFormat(): string
    {
        return $this->internationalize();
    }
}