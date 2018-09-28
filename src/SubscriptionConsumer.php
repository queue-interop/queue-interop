<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrSubscriptionConsumer');

if (\false) {
    interface SubscriptionConsumer extends PsrSubscriptionConsumer
    {
    }
}