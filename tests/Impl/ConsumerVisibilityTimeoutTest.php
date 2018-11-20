<?php
declare(strict_types=1);

namespace Interop\Queue\Tests\Impl;

use Interop\Queue\Impl\ConsumerVisibilityTimeoutTrait;
use PHPUnit\Framework\TestCase;

class ConsumerVisibilityTimeoutTest extends TestCase
{

    public function testShoudGetAndSetVisibilityTimeout()
    {
        $consumer = new class {
            use ConsumerVisibilityTimeoutTrait;
        };

        $this->assertNull($consumer->getVisibilityTimeout());

        $consumer->setVisibilityTimeout(123);

        $this->assertSame(123, $consumer->getVisibilityTimeout());
    }

}