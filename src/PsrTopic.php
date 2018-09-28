<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one without Psr prefix.
 *
 * A Topic object encapsulates a provider-specific topic name.
 * It is the way a client specifies the identity of a topic to transport methods.
 * For those methods that use a Destination as a parameter, a Topic object may used as an argument.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/Topic.html
 */
interface PsrTopic extends PsrDestination
{
    /**
     * Gets the name of this topic. This is a destination one sends messages to.
     */
    public function getTopicName(): string;
}

class_alias('Interop\Queue\PsrTopic', 'Interop\Queue\Topic', false);
class_exists('Interop\Queue\PsrDestination');
