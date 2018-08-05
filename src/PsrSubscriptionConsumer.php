<?php
namespace Interop\Queue;

interface PsrSubscriptionConsumer
{
    /**
     * @param float|int $timeout Milliseconds 1000 is 1 second, a zero is consume endlessly.
     */
    public function consume($timeout = 0);

    /**
     * Notify broker that the client is interested in consuming messages from this queue.
     *
     * A callback function to which the consumed message will be passed.
     * The function must accept at a minimum one parameter, an \Interop\Queue\PsrMessage object,
     * and an optional second parameter the \Interop\Queue\PsrConsumer from which the message was
     * consumed. The consumer will not return the processing thread back to
     * the PHP script until the callback function returns FALSE.
     *
     * @param PsrConsumer $consumer
     * @param callable     $callback
     *
     * @return void
     */
    public function subscribe(PsrConsumer $consumer, callable $callback);

    /**
     * @param PsrConsumer $consumer
     *
     * @return void
     */
    public function unsubscribe(PsrConsumer $consumer);

    /**
     * Unsubscribe all subscribed consumers.
     *
     * @return void
     */
    public function unsubscribeAll();
}
