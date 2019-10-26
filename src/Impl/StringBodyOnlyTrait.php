<?php

namespace Interop\Queue\Impl;

trait StringBodyOnlyTrait
{
    /**
     * @var string
     */
    private $body;

    public function setBody($body): void
    {
        if (! \is_string($body)) {
            throw new \InvalidArgumentException(\sprintf(
                'Body must be of the type string, %s given',
                \gettype($body)
            ));
        }

        $this->body = $body;
    }

    public function getBody(): string
    {
        return $this->body;
    }
}
