<?php
declare(strict_types=1);

namespace Interop\Queue;

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
