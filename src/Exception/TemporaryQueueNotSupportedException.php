<?php
declare(strict_types=1);

namespace Interop\Queue\Exception;

class TemporaryQueueNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable|null $previous
     *
     * @return static
     * @psalm-pure
     */
    public static function providerDoestNotSupportIt(int $code = 0, ?\Throwable $previous = null): self
    {
        return new static('The provider does not support temporary queue feature', $code, $previous);
    }
}
