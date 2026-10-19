<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @psalm-capabilities read-props|write-this-props|write-refs
 */
interface Queue extends Destination
{
    /**
     * Gets the name of this queue. This is a destination one consumes messages from.
     * @psalm-capabilities read-props
     */
    public function getQueueName(): string;
}
