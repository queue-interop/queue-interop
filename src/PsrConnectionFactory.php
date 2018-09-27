<?php
declare(strict_types=1);

namespace Interop\Queue;

/**
 * @deprecated will be removed in later versions. use one without Psr prefix.
 */
interface PsrConnectionFactory
{
    public function createContext(): PsrContext;
}

class_alias('Interop\Queue\PsrConnectionFactory', 'Interop\Queue\ConnectionFactory', false);
class_exists('Interop\Queue\PsrContext');
