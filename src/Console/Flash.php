<?php

namespace Tnt\FlashMessage\Console;

use Oak\Console\Command\Argument;
use Oak\Console\Command\Command;
use Oak\Console\Command\Signature;
use Oak\Contracts\Console\InputInterface;
use Oak\Contracts\Console\OutputInterface;
use Oak\Session\Facade\Session;

class Flash extends Command
{
    protected function createSignature(Signature $signature): Signature
    {
        return $signature
            ->setName('flash')
            ->addArgument(Argument::create('sessionId')->setDescription('The id of the session'))
            ->addArgument(Argument::create('message')->setDescription('The message to flash'))
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $sessionId = $input->getArgument('sessionId');
        $message = $input->getArgument('message');

        Session::setId($sessionId);
        \Tnt\FlashMessage\Facade\Flash::message($message);
    }
}