<?php
declare(strict_types=1);

namespace Interop\Queue\Tests\Impl;

use Interop\Queue\Message;
use Interop\Queue\Spec\MessageSpec;
use Interop\Queue\Impl\MessageTrait;

class MessageTest extends MessageSpec
{
    protected function createMessage(): Message
    {
        return new class implements Message
        {
            use MessageTrait;

            public function __construct(string $body = '', array $properties = [], array $headers = [])
            {
                $this->body = $body;
                $this->properties = $properties;
                $this->headers = $headers;

                $this->redelivered = false;
            }
        };
    }
}