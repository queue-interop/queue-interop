<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one from Interop\Queue\Exception namespace.
 *
 * This is the root class of all transport's exceptions.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/JMSException.html
 */
class Exception extends \Exception implements ExceptionInterface
{
}

class_alias('Interop\Queue\Exception', 'Interop\Queue\Exception\Exception', false);
