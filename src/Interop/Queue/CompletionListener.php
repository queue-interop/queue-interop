<?php

namespace Interop\Queue;

/**
 * A CompletionListener is implemented by the application and may be specified when a message is sent asynchronously.
 *
 * When the sending of the message is complete, the provider notifies the application by calling the onCompletion(PsrMessage) method of the specified completion listener.
 * If the sending of the message fails for any reason, and an exception cannot be thrown by the send method, then the provider calls the onException(PsrException) method of the specified completion listener.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/CompletionListener.html
 */
interface CompletionListener
{
    /**
     * Notifies the application that the message has been successfully sent
     *
     * @param PsrMessage $message
     */
    public function onCompletion(PsrMessage $message);

    /**
     * Notifies user that the specified exception was thrown while attempting to send the specified message.
     *
     * @param PsrMessage $message
     * @param \Exception|\Throwable $exception
     */
    public function onException(PsrMessage $message, $exception);
}