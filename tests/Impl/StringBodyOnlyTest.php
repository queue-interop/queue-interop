<?php

namespace Interop\Queue\Tests\Impl;

use Interop\Queue\Impl\StringBodyOnlyTrait;
use PHPUnit\Framework\TestCase;

final class StringBodyOnlyTest extends TestCase
{
    /** @var object */
    private $message;

    protected function setUp(): void
    {
        $this->message = new class() {
            use StringBodyOnlyTrait;
        };
    }

    public function testSetBody(): void
    {
        $this->message->setBody($body = 'foo');

        $this->assertSame($body, $this->message->getBody());
    }

    public function testSetBodyThrowsExceptionOnNonString(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $this->message->setBody(['foo' => 'bar']);
    }
}
