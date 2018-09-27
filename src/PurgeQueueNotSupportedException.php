<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 */
class PurgeQueueNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt(int $code = 0, \Throwable $previous = null): self
    {
        return new static('The provider does not support purge queue.', $code, $previous);
    }
}

class_alias('Interop\Queue\PurgeQueueNotSupportedException', 'Interop\Queue\Exception\PurgeQueueNotSupportedException', false);
class_exists('Interop\Queue\Exception');
