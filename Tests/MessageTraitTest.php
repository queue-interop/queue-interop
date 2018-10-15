<?php
declare(strict_types=1);

namespace Interop\Queue\Tests;

use Interop\Queue\Message;
use Interop\Queue\MessageTrait;
use Interop\Queue\Test\MessageTestCase;

class MessageTraitTestCase extends MessageTestCase
{
    public function getMessage(...$arguments): Message
    {
        return new MessageTraitTest_Class(...$arguments);
    }
}

class MessageTraitTest_Class implements Message
{
    use MessageTrait;

    public function __construct(string $body = '', array $properties = [], array $headers = [])
    {
        $this->body = $body;
        $this->properties = $properties;
        $this->headers = $headers;

        $this->redelivered = false;
    }
}
