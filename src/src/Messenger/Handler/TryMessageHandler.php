<?php

namespace App\Messenger\Handler;

use App\Messenger\Message\TryMessage;
use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class TryMessageHandler
{
    public function __construct(
        protected MessageBusInterface $bus,
        protected LoggerInterface $logger
    )
    {
    }

    public function __invoke(TryMessage $message): void
    {
        $this->logger->debug('Consumed message: ' . $message->message);
    }
}