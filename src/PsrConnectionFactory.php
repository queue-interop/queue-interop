<?php

namespace Interop\Queue;

interface PsrConnectionFactory
{
    /**
     * @return PsrContext
     */
    public function createContext();
}
