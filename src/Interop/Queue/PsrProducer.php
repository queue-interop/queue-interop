<?php

namespace Interop\Queue;

interface PsrProducer
{
    /**
     * Gets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     *
     * @return float
     */
    public function getDeliveryDelay();

    /**
     * Sets the minimum length of time in milliseconds that must elapse after a message is sent before the provider may deliver the message to a consumer.
     *
     * deliveryDelay is set to zero by default.
     *
     * @param float $deliveryDelay the delivery delay in milliseconds.
     */
    public function setDeliveryDelay($deliveryDelay);

    /**
     * @param PsrDestination $destination
     * @param PsrMessage     $message
     *
     * @throws Exception                   if the provider fails to send the message due to some internal error
     * @throws InvalidDestinationException if a client uses this method with an invalid destination
     * @throws InvalidMessageException     if an invalid message is specified
     */
    public function send(PsrDestination $destination, PsrMessage $message);
}
