<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
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
     *
     * @return PsrQueue
     */
    public function getQueue(): PsrQueue;

    /**
     * Receives the next message that arrives within the specified timeout interval.
     * This call blocks until a message arrives, the timeout expires, or this message consumer is closed.
     * A timeout of zero never expires, and the call blocks indefinitely.
     *
     * @param int $timeout the timeout value (in milliseconds)
     *
     * @return PsrMessage|null
     */
    public function receive(int $timeout = 0): ?PsrMessage;

    /**
     * Receives the next message if one is immediately available.
     *
     * @return PsrMessage|null
     */
    public function receiveNoWait(): ?PsrMessage;

    /**
     * Tell the MQ broker that the message was processed successfully.
     *
     * @param PsrMessage $message
     */
    public function acknowledge(PsrMessage $message): void;

    /**
     * Tell the MQ broker that the message was rejected.
     *
     * @param PsrMessage $message
     * @param bool       $requeue
     */
    public function reject(PsrMessage $message, bool $requeue = false): void;
}
