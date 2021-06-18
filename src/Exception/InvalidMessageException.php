<?php
declare(strict_types=1);

namespace Interop\Queue\Exception;

use Interop\Queue\Message;

class InvalidMessageException extends Exception
{
    /**
     * @param Message $message
     * @param string  $class
     *
     * @template TClass
     * @psalm-param class-string<TClass> $class
     * @psalm-assert TClass $message
     *
     * @throws static
     */
    public static function assertMessageInstanceOf(Message $message, string $class): void
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
