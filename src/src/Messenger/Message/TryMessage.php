<?php

namespace App\Messenger\Message;

class TryMessage
{
    public function __construct(
        public ?string $message = null,
    ) {
    }
}