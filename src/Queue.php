<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrQueue');

if (\false) {
    interface Queue extends PsrQueue
    {
    }
}
