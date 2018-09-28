<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 */
class InvalidDestinationException extends Exception
{
    /**
     * @param mixed  $destination
     * @param string $class
     *
     * @throws static
     */
    public static function assertDestinationInstanceOf($destination, string $class): void
    {
        if (!$destination instanceof $class) {
            throw new static(sprintf(
                'The destination must be an instance of %s but got %s.',
                $class,
                is_object($destination) ? get_class($destination) : gettype($destination)
            ));
        }
    }
}

class_alias('Interop\Queue\InvalidDestinationException', 'Interop\Queue\Exception\InvalidDestinationException', false);
class_exists('Interop\Queue\Exception');