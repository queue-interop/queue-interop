<?php
declare(strict_types=1);

namespace Interop\Queue;

interface Queue extends Destination
{
    /**
     * Gets the name of this queue. This is a destination one consumes messages from.
     */
    public function getQueueName(): string;
}
