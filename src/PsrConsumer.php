<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one without Psr prefix.
 *
 * A client uses a MessageConsumer object to receive messages from a destination.
 * A MessageConsumer object is created by passing a Destination object
 * to a message-consumer creation method supplied by a session.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/MessageConsumer.html
 */
interface PsrConsumer
{
    /**
     * Gets the Queue associated with this queue receiver.
     */
    public function getQueue(): PsrQueue;

    /**
     * Receives the next message that arrives within the specified timeout interval.
     * This call blocks until a message arrives, the timeout expires, or this message consumer is closed.
     * A timeout of zero never expires, and the call blocks indefinitely.
     *
     * Timeout is in milliseconds
     */
    public function receive(int $timeout = 0): ?PsrMessage;

    /**
     * Receives the next message if one is immediately available.
     */
    public function receiveNoWait(): ?PsrMessage;

    /**
     * Tell the MQ broker that the message was processed successfully.
     */
    public function acknowledge(PsrMessage $message): void;

    /**
     * Tell the MQ broker that the message was rejected.
     */
    public function reject(PsrMessage $message, bool $requeue = false): void;
}

class_alias('Interop\Queue\PsrConsumer', 'Interop\Queue\Consumer', false);
class_exists('Interop\Queue\PsrQueue');
class_exists('Interop\Queue\PsrMessage');