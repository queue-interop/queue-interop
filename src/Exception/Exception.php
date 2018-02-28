<?php

namespace Interop\Queue\Exception;

/**
 * This is the root class of all transport's exceptions.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/JMSException.html
 */
class Exception extends \Exception implements ExceptionInterface
{
}
