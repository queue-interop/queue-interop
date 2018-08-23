<?php
declare(strict_types=1);

namespace Interop\Queue;

interface PsrConnectionFactory
{
    public function createContext(): PsrContext;
}
