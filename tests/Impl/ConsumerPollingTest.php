<?php
namespace Interop\Queue\Tests\Impl;

use Interop\Queue\Impl\ConsumerPollingTrait;
use Interop\Queue\Message;
use PHPUnit\Framework\TestCase;

class ConsumerPollingTest extends TestCase
{

    public function getConsumer(callable $receiveNoWait)
    {
        return new class($receiveNoWait)
        {
            use ConsumerPollingTrait;

            private $count = 0;
            private $callable;

            public function __construct(callable $receiveNoWait)
            {
                $this->callable = $receiveNoWait;
            }

            public function receiveNoWait(): ?Message
            {
                $callable = $this->callable;
                return $callable($this->count);
            }
        };
    }

    public function testShouldTimeout()
    {
        $consumer = $this->getConsumer(function() {
            return null;
        });

        $start = microtime(true);

        $consumer->receive(250);

        $timer = microtime(true) - $start;

        $this->assertGreaterThan(0.250, $timer);
        $this->assertLessThan(0.255, $timer);
    }

    public function testShouldCallThreeTimes()
    {
        $message = $this->getMockForAbstractClass(Message::class);

        $consumer = $this->getConsumer(function(int &$count) use($message) {
            $count++;
            if(3 === $count) {
                return $message;
            }
            return null;
        });
        $consumer->setPollingInterval(100);

        $start = microtime(true);

        $this->assertSame($message, $consumer->receive(250));

        $timer = microtime(true) - $start;

        $this->assertGreaterThan(0.200, $timer);
        $this->assertLessThan(0.205, $timer);
    }
}
