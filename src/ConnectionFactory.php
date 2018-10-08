<?php
declare(strict_types=1);

namespace Interop\Queue;

interface ConnectionFactory
{
    public function createContext(): Context;
}