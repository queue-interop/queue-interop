<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 */
class SubscriptionConsumerNotSupportedException extends Exception
{
    /**
     * @param int $code
     * @param \Throwable $previous
     *
     * @return static
     */
    public static function providerDoestNotSupportIt(int $code = 0, \Throwable $previous = null): self
    {
        return new static('The provider does not support subscription consumer.', $code, $previous);
    }
}

class_alias('Interop\Queue\SubscriptionConsumerNotSupportedException', 'Interop\Queue\Exception\SubscriptionConsumerNotSupportedException', false);
class_exists('Interop\Queue\Exception');
