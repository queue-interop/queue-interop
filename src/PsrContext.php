<?php
declare(strict_types=1);

namespace Interop\Queue;

interface PsrContext
{
    public function createMessage(string $body = '', array $properties = [], array $headers = []): PsrMessage;

    public function createTopic(string $topicName): PsrTopic;

    public function createQueue(string $queueName): PsrQueue;

    /**
     * Create temporary queue.
     * The queue is visible by this connection only.
     * It will be deleted once the connection is closed.
     *
     * @throws TemporaryQueueNotSupportedException
     */
    public function createTemporaryQueue(): PsrQueue;

    public function createProducer(): PsrProducer;

    public function createConsumer(PsrDestination $destination): PsrConsumer;

    /**
     * @throws SubscriptionConsumerNotSupportedException
     */
    public function createSubscriptionConsumer(): PsrSubscriptionConsumer;

    /**
     * @throws PurgeQueueNotSupportedException
     */
    public function purgeQueue(PsrQueue $queue): void;

    public function close(): void;
}
