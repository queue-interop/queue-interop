<?php
namespace Interop\Queue;

interface PsrSubscriptionConsumerAwareContext
{
    /**
     * @return PsrSubscriptionConsumer
     */
    public function createSubscriptionConsumer();
}
