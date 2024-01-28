<?php

namespace App\Command;

use App\Messenger\Message\TryMessage;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Messenger\MessageBusInterface;
use Throwable;

#[AsCommand(
    name: 'app:send-message-to-kafka',
    description: 'send message to Kafka',
)]
class SendMessageToKafkaCommand extends Command
{
    public function __construct(private readonly MessageBusInterface $bus)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $io->note(sprintf('You are trying to send message: %s', $arg1));
        } else {
            $io->error('You must pass message text as argument to this command');
            throw new \InvalidArgumentException();
        }

        if ($input->getOption('option1')) {
            // ...
        }

        try {
            $this->bus->dispatch(
                new TryMessage($arg1)
            );

            $io->success('Message successfully sent');
        } catch (Throwable $e) {
            $output->writeln(sprintf(
                '<error>Failed to send message to broker with error message : %s</error>',
                $e->getMessage()
            ));

            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }
}
