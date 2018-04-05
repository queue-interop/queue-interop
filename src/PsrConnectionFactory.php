<?php
declare(strict_types=1);

namespace Interop\Queue;

interface PsrConnectionFactory
{
    /**
     * @return PsrContext
     */
    public function createContext(): PsrContext;
}
