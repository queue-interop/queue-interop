<?php
declare(strict_types=1);

namespace Interop\Queue\Test;

use Interop\Queue\Message;
use PHPUnit\Framework\TestCase;

abstract class MessageTestCase extends TestCase
{
    public abstract function getMessage(): Message;

    public function testCouldConstructMessageWithoutArguments()
    {
        $message = $this->getMessage();

        $this->assertSame('', $message->getBody());
        $this->assertSame([], $message->getProperties());
        $this->assertSame([], $message->getHeaders());
        $this->assertSame(false, $message->isRedelivered());
    }

    public function testCouldBeConstructedWithOptionalArguments()
    {
        $message = $this->getMessage('theBody', ['barProp' => 'barPropVal'], ['fooHeader' => 'fooHeaderVal']);

        $this->assertSame('theBody', $message->getBody());
        $this->assertSame(['barProp' => 'barPropVal'], $message->getProperties());
        $this->assertSame(['fooHeader' => 'fooHeaderVal'], $message->getHeaders());
        $this->assertSame(false, $message->isRedelivered());
    }

    public function testShouldSetBody()
    {
        $message = $this->getMessage();
        $message->setBody('the-body');

        $this->assertSame('the-body', $message->getBody());
    }

    public function testShouldSetProperties()
    {
        $message = $this->getMessage();
        $message->setProperty('the-other-property', 'the-other-value');
        $message->setProperties(['the-property' => 'the-value']);

        $this->assertSame(['the-property' => 'the-value'], $message->getProperties());
        $this->assertSame('the-value', $message->getProperty('the-property'));
        $this->assertSame(null, $message->getProperty('the-other-property'));
    }

    public function testShouldSetAndUnsetProperty()
    {
        $message = $this->getMessage();
        $message->setProperty('the-property', 'the-value');

        $this->assertSame(['the-property' => 'the-value'], $message->getProperties());
        $this->assertSame('the-value', $message->getProperty('the-property'));
        $this->assertSame('the-value', $message->getProperty('the-property', 'the-default'));

        $message->setProperty('the-property', null);

        $this->assertSame([], $message->getProperties());
        $this->assertSame(null, $message->getProperty('the-property'));
        $this->assertSame('the-default', $message->getProperty('the-property', 'the-default'));
    }

    public function testShouldSetHeaders()
    {
        $message = $this->getMessage();
        $message->setHeader('the-other-header', 'the-other-value');
        $message->setHeaders(['the-header' => 'the-value']);

        $this->assertSame(['the-header' => 'the-value'], $message->getHeaders());
        $this->assertSame('the-value', $message->getHeader('the-header'));
        $this->assertSame(null, $message->getHeader('the-other-header'));
    }

    public function testShouldSetAndUnsetHeader()
    {
        $message = $this->getMessage();
        $message->setHeader('the-header', 'the-value');

        $this->assertSame(['the-header' => 'the-value'], $message->getHeaders());
        $this->assertSame('the-value', $message->getHeader('the-header'));
        $this->assertSame('the-value', $message->getHeader('the-header', 'the-default'));

        $message->setHeader('the-header', null);

        $this->assertSame([], $message->getHeaders());
        $this->assertSame(null, $message->getHeader('the-header'));
        $this->assertSame('the-default', $message->getHeader('the-header', 'the-default'));
    }

    public function testShouldSetCorrelationIdAsHeader()
    {
        $message = $this->getMessage();
        $message->setCorrelationId('the-correlation-id');

        $this->assertSame(['correlation_id' => 'the-correlation-id'], $message->getHeaders());
    }

    public function testCouldSetMessageIdAsHeader()
    {
        $message = $this->getMessage();
        $message->setMessageId('the-message-id');

        $this->assertSame(['message_id' => 'the-message-id'], $message->getHeaders());
    }

    public function testCouldSetTimestampAsHeader()
    {
        $message = $this->getMessage();
        $message->setTimestamp(12345);

        $this->assertSame(['timestamp' => 12345], $message->getHeaders());
    }

    public function testShouldSetReplyToAsHeader()
    {
        $message = $this->getMessage();
        $message->setReplyTo('theQueueName');

        $this->assertSame(['reply_to' => 'theQueueName'], $message->getHeaders());
    }
}
