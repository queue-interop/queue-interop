<?php
declare(strict_types=1);

namespace Interop\Queue;

interface SubscriptionConsumer
{
    /**
     * The timeout is in milliseconds.
     * Set zero to consume endlessly or till a consumer returns false.
     */
    public function consume(int $timeout = 0): void;

    /**
     * Notify broker that the client is interested in consuming messages from this queue.
     *
     * A callback function to which the consumed message will be passed.
     * The function must accept at a minimum one parameter, an \Interop\Queue\Message object,
     * and an optional second parameter the \Interop\Queue\Consumer from which the message was
     * consumed. The consumer will not return the processing thread back to
     * the PHP script until the callback function returns FALSE.
     */
    public function subscribe(Consumer $consumer, callable $callback): void;

    public function unsubscribe(Consumer $consumer): void;

    public function unsubscribeAll(): void;
}