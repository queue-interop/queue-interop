<?php
declare(strict_types=1);

namespace Interop\Queue\Exception;

class DeliveryDelayNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt(int $code = 0, \Throwable $previous = null): self
    {
        return new static('The provider does not support delivery delay feature', $code, $previous);
    }
}