<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrMessage');

if (\false) {
    interface Message extends PsrMessage
    {
    }
}