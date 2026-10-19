<?php
declare(strict_types=1);

namespace Interop\Queue\Exception;

/**
 * @psalm-consistent-constructor
 */
class Exception extends \Exception implements \Interop\Queue\Exception
{
    /**
     * @psalm-capabilities read-props
     */
    public function __construct(string $message = "", int $code = 0, ?\Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}