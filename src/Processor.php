<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrProcessor');

if (\false) {
    interface Processor extends PsrProcessor
    {
    }
}