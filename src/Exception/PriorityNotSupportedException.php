<?php

namespace Interop\Queue\Exception;

class PriorityNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt($code = 0, $previous = null)
    {
        return new static('The provider does not support priority feature', $code, $previous);
    }
}
