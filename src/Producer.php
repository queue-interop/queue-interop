<?php
declare(strict_types=1);

namespace Interop\Queue;

use Interop\Queue\Exception\DeliveryDelayNotSupportedException;
use Interop\Queue\Exception\InvalidDestinationException;
use Interop\Queue\Exception\InvalidMessageException;
use Interop\Queue\Exception\PriorityNotSupportedException;
use Interop\Queue\Exception\TimeToLiveNotSupportedException;

/**
 * @psalm-purity-template P
 */
interface Producer
{
    /**
     * @throws Exception                   if the provider fails to send the message due to some internal error
     * @throws InvalidDestinationException if a client uses this method with an invalid destination
     * @throws InvalidMessageException     if an invalid message is specified
     * @psalm-capabilities read-props
     * @psalm-purity-from-template P
     */
    public function send(Destination $destination, Message $message): void;

    /**
     * Sets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     * deliveryDelay is set to null default.
     *
     * The delivery delay is in milliseconds. Use null to unset delivery delay and use transport's mode
     *
     * @throws DeliveryDelayNotSupportedException if producer does not support delivery delay feature
     * @psalm-capabilities read-props
     */
    public function setDeliveryDelay(?int $deliveryDelay = null): self;

    /**
     * Gets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     *
     * @return int|null the delivery delay in milliseconds.
     * @psalm-pure
     */
    public function getDeliveryDelay(): ?int;

    /**
     * Specifies the priority of messages that are sent using this Producer
     * The API defines ten levels of priority value, with 0 as the lowest priority and 9 as the highest.
     * Clients should consider priorities 0-4 as gradations of normal priority and priorities 5-9 as gradations of expedited priority.
     * Priority is set to null by default.
     *
     * Use null to unset priority and use transport's mode
     *
     * @throws PriorityNotSupportedException if producer does not support priority feature
     * @psalm-capabilities read-props
     */
    public function setPriority(?int $priority = null): self;

    /**
     * Return the priority of messages that are sent using this Producer
     * @psalm-pure
     */
    public function getPriority(): ?int;

    /**
     * Specifies the time to live of messages that are sent using this Producer.
     * This is used to determine the expiration time of a message.
     * The expiration time of a message is the sum of the message's time to live and the time it is sent.
     * Clients should not receive messages that have expired; however, This interop does not guarantee that this will not happen.
     * A provider should do its best to accurately expire messages; however, it does not define the accuracy provided.
     * It is not acceptable to simply ignore time-to-live.
     * timeToLive is set to null default.
     *
     * The message time to live to be used, in milliseconds; a value of zero means that a message never expires. Use null to unset time to live and use transport's mode
     *
     * @throws TimeToLiveNotSupportedException if producer does not support time to live feature
     * @psalm-capabilities read-props
     */
    public function setTimeToLive(?int $timeToLive = null): self;

    /**
     * Returns the time to live of messages that are sent using this JMSProducer.
     *
     * @return int|null the message time to live in milliseconds; a value of zero means that a message never expires.
     * @psalm-pure
     */
    public function getTimeToLive(): ?int;
}
