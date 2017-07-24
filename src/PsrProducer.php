<?php

namespace Interop\Queue;

interface PsrProducer
{
    /**
     * @param PsrDestination $destination
     * @param PsrMessage     $message
     *
     * @throws Exception                   if the provider fails to send the message due to some internal error
     * @throws InvalidDestinationException if a client uses this method with an invalid destination
     * @throws InvalidMessageException     if an invalid message is specified
     */
    public function send(PsrDestination $destination, PsrMessage $message);

    /**
     * Sets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     * deliveryDelay is set to zero by default.
     *
     * @param float|int $deliveryDelay - the delivery delay in milliseconds.
     */
    public function setDeliveryDelay($deliveryDelay);

    /**
     * Gets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     *
     * @return int|float the delivery delay in milliseconds.
     */
    public function getDeliveryDelay();

    /**
     * Specifies the priority of messages that are sent using this Producer
     * The API defines ten levels of priority value, with 0 as the lowest priority and 9 as the highest.
     * Clients should consider priorities 0-4 as gradations of normal priority and priorities 5-9 as gradations of expedited priority.
     * Priority is set to 4 by default.
     *
     * @param int $priority
     */
    public function setPriority($priority);

    /**
     * Return the priority of messages that are sent using this Producer
     *
     * @return int the message priority
     */
    public function getPriority();

    /**
     * Specifies the time to live of messages that are sent using this Producer.
     * This is used to determine the expiration time of a message.
     * The expiration time of a message is the sum of the message's time to live and the time it is sent.
     * Clients should not receive messages that have expired; however, This interop does not guarantee that this will not happen.
     * A provider should do its best to accurately expire messages; however, it does not define the accuracy provided.
     * It is not acceptable to simply ignore time-to-live.
     *
     * @param int|float $timeToLive the message time to live to be used, in milliseconds; a value of zero means that a message never expires.
     */
    public function setTimeToLive($timeToLive);

    /**
     * Returns the time to live of messages that are sent using this JMSProducer.
     *
     * @return int|float the message time to live in milliseconds; a value of zero means that a message never expires.
     */
    public function getTimeToLive();
}
