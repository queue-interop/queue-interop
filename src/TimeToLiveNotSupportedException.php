<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 */
class TimeToLiveNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt(int $code = 0, \Throwable $previous = null): self
    {
        return new static('The provider does not support time to live feature', $code, $previous);
    }
}

class_alias('Interop\Queue\TimeToLiveNotSupportedException', 'Interop\Queue\Exception\TimeToLiveNotSupportedException', false);
class_exists('Interop\Queue\Exception');
