<?php
declare(strict_types=1);

namespace Interop\Queue;

interface PsrContext
{
    /**
     * @param string $body
     * @param array  $properties
     * @param array  $headers
     *
     * @return PsrMessage
     */
    public function createMessage(string $body = '', array $properties = [], array $headers = []): PsrMessage;

    /**
     * @param string $topicName
     *
     * @return PsrTopic
     */
    public function createTopic(string $topicName): PsrTopic;

    /**
     * @param string $queueName
     *
     * @return PsrQueue
     */
    public function createQueue(string $queueName): PsrQueue;

    /**
     * Create temporary queue.
     * The queue is visible by this connection only.
     * It will be deleted once the connection is closed.
     *
     * @return PsrQueue
     */
    public function createTemporaryQueue(): PsrQueue;

    /**
     * @return PsrProducer
     */
    public function createProducer(): PsrProducer;

    /**
     * @param PsrDestination $destination
     *
     * @return PsrConsumer
     */
    public function createConsumer(PsrDestination $destination): PsrConsumer;

    /**
     * @throws SubscriptionConsumerNotSupportedException
     *
     * @return PsrSubscriptionConsumer
     */
    public function createSubscriptionConsumer(): PsrSubscriptionConsumer;

    /**
     * @param PsrQueue $queue
     *
     * @throws PurgeQueueNotSupportedException
     */
    public function purgeQueue(PsrQueue $queue): void;

    public function close(): void;
}
