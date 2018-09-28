<?php
declare(strict_types=1);

namespace Interop\Queue\Exception;

class_exists('Interop\Queue\DeliveryDelayNotSupportedException');

if (\false) {
    class DeliveryDelayNotSupportedException extends \Interop\Queue\DeliveryDelayNotSupportedException
    {
    }
}