<?php
declare(strict_types=1);

namespace Interop\Queue;

class_exists('Interop\Queue\PsrConsumer');

if (\false) {
    interface Consumer extends PsrConsumer
    {
    }
}