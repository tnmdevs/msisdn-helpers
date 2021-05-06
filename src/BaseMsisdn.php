<?php


namespace TNM\Msisdn;


abstract class BaseMsisdn implements IMsisdn
{
    private string $msisdn;

    protected function __construct(string $msisdn)
    {
//        if (!$this->isCalledFromFactory())
//            throw new MsisdnException(sprintf('MSISDN can only be initialized by the %s', MsisdnFactory::class));

        $this->msisdn = $msisdn;
    }

//    private function isCalledFromFactory(): bool
//    {
//        var_dump(debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['file']); die;
//        return preg_match('/MsisdnFactory\.php$/', debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS, 2)[1]['file']);
//    }

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