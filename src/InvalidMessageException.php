<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 */
class InvalidMessageException extends Exception
{
    /**
     * @param PsrMessage $message
     * @param string     $class
     *
     * @throws static
     */
    public static function assertMessageInstanceOf(PsrMessage $message, string $class): void
    {
        if (!$message instanceof $class) {
            throw new static(sprintf(
                'The message must be an instance of %s but it is %s.',
                $class,
                get_class($message)
            ));
        }
    }
}

class_alias('Interop\Queue\InvalidMessageException', 'Interop\Queue\Exception\InvalidMessageException', false);
class_exists('Interop\Queue\Exception');