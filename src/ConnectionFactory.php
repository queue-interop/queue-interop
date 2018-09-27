<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrConnectionFactory');

if (\false) {
    interface ConnectionFactory extends PsrConnectionFactory
    {
    }
}