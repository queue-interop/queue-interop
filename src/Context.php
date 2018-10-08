<?php
declare(strict_types=1);

namespace Interop\Queue;

use Interop\Queue\Exception\PurgeQueueNotSupportedException;
use Interop\Queue\Exception\SubscriptionConsumerNotSupportedException;
use Interop\Queue\Exception\TemporaryQueueNotSupportedException;

interface Context
{
    public function createMessage(string $body = '', array $properties = [], array $headers = []): Message;

    public function createTopic(string $topicName): Topic;

    public function createQueue(string $queueName): Queue;

    /**
     * Create temporary queue.
     * The queue is visible by this connection only.
     * It will be deleted once the connection is closed.
     *
     * @throws TemporaryQueueNotSupportedException
     */
    public function createTemporaryQueue(): Queue;

    public function createProducer(): Producer;

    public function createConsumer(Destination $destination): Consumer;

    /**
     * @throws SubscriptionConsumerNotSupportedException
     */
    public function createSubscriptionConsumer(): SubscriptionConsumer;

    /**
     * @throws PurgeQueueNotSupportedException
     */
    public function purgeQueue(Queue $queue): void;

    public function close(): void;
}