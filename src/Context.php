<?php
declare(strict_types=1);

namespace Interop\Queue;

use Interop\Queue\Exception\PurgeQueueNotSupportedException;
use Interop\Queue\Exception\SubscriptionConsumerNotSupportedException;
use Interop\Queue\Exception\TemporaryQueueNotSupportedException;

/**
 * @psalm-purity-template P
 */
interface Context
{
    /**
     * Create message
     *
     * @param string $body
     * @param array<string, mixed> $properties
     * @param array<string, mixed> $headers
     * @return Message
     * @psalm-pure
     */
    public function createMessage(string $body = '', array $properties = [], array $headers = []): Message;

    /**
     * @psalm-pure
     */
    public function createTopic(string $topicName): Topic;

    /**
     * @psalm-pure
     */
    public function createQueue(string $queueName): Queue;

    /**
     * Create temporary queue.
     * The queue is visible by this connection only.
     * It will be deleted once the connection is closed.
     *
     * @throws TemporaryQueueNotSupportedException
     * @psalm-pure
     */
    public function createTemporaryQueue(): Queue;

    /**
     * @psalm-capabilities read-props
     * @psalm-purity-from-template P
     */
    public function createProducer(): Producer;

    /**
     * @psalm-capabilities read-props
     * @psalm-purity-from-template P
     */
    public function createConsumer(Destination $destination): Consumer;

    /**
     * @throws SubscriptionConsumerNotSupportedException
     * @psalm-pure
     */
    public function createSubscriptionConsumer(): SubscriptionConsumer;

    /**
     * @throws PurgeQueueNotSupportedException
     * @psalm-pure
     */
    public function purgeQueue(Queue $queue): void;

    /**
     * @psalm-capabilities read-props
     * @psalm-purity-from-template P
     */
    public function close(): void;
}