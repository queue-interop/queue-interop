<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * The Message interface is the root interface of all transport messages.
 * Most message-oriented middleware (MOM) products
 * treat messages as lightweight entities that consist of a header and a payload.
 * The header contains fields used for message routing and identification;
 * the payload contains the application data being sent.
 *
 * Within this general form, the definition of a message varies significantly across products.
 *
 * @see https://docs.oracle.com/javaee/7/api/javax/jms/Message.html
 */
interface Message
{
    public function getBody(): string;

    public function setBody(string $body): void;

    public function setProperties(array $properties): void;

    /**
     * Returns [name => value, ...]
     */
    public function getProperties(): array;

    public function setProperty(string $name, $value): void;

    public function getProperty(string $name, $default = null);

    public function setHeaders(array $headers): void;

    /**
     * Returns [name => value, ...]
     */
    public function getHeaders(): array;

    public function setHeader(string $name, $value): void;

    public function getHeader(string $name, $default = null);

    public function setRedelivered(bool $redelivered): void;

    /**
     * Gets an indication of whether this message is being redelivered.
     * The message is considered as redelivered,
     * when it was sent by a broker to consumer but consumer does not ACK or REJECT it.
     * The broker brings the message back to the queue and mark it as redelivered.
     */
    public function isRedelivered(): bool;

    /**
     * Sets the correlation ID for the message.
     * A client can use the correlation header field to link one message with another.
     * A typical use is to link a response message with its request message.
     */
    public function setCorrelationId(string $correlationId = null): void;

    /**
     * Gets the correlation ID for the message.
     * This method is used to return correlation ID values that are either provider-specific message IDs
     * or application-specific String values.
     */
    public function getCorrelationId(): ?string;

    /**
     * Sets the message ID.
     * Providers set this field when a message is sent.
     * This method can be used to change the value for a message that has been received.
     */
    public function setMessageId(string $messageId = null): void;

    /**
     * Gets the message Id.
     * The MessageId header field contains a value that uniquely identifies each message sent by a provider.
     *
     * When a message is sent, MessageId can be ignored.
     */
    public function getMessageId(): ?string;

    /**
     * Gets the message timestamp.
     * The timestamp header field contains the time a message was handed off to a provider to be sent.
     * It is not the time the message was actually transmitted,
     * because the actual send may occur later due to transactions or other client-side queueing of messages.
     */
    public function getTimestamp(): ?int;

    /**
     * Sets the message timestamp.
     * Providers set this field when a message is sent.
     * This method can be used to change the value for a message that has been received.
     */
    public function setTimestamp(int $timestamp = null): void;

    /**
     * Sets the destination to which a reply to this message should be sent.
     * The ReplyTo header field contains the destination where a reply to the current message should be sent. If it is null, no reply is expected.
     * The destination may be a Queue only. A topic is not supported at the moment.
     * Messages sent with a null ReplyTo value may be a notification of some event, or they may just be some data the sender thinks is of interest.
     * Messages with a ReplyTo value typically expect a response.
     * A response is optional; it is up to the client to decide. These messages are called requests.
     * A message sent in response to a request is called a reply.
     * In some cases a client may wish to match a request it sent earlier with a reply it has just received.
     * The client can use the CorrelationID header field for this purpose.

     */
    public function setReplyTo(string $replyTo = null): void;

    /**
     * Gets the destination to which a reply to this message should be sent.
     */
    public function getReplyTo(): ?string;
}