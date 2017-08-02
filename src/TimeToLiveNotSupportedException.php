<?php

namespace Interop\Queue;

class TimeToLiveNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt($code = 0, $previous = null)
    {
        return new static('The provider does not support time to live feature', $code, $previous);
    }
}
