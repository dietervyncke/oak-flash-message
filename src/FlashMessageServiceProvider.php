<?php

namespace Tnt\FlashMessage;

use Oak\Console\Facade\Console;
use Oak\Contracts\Container\ContainerInterface;
use Oak\ServiceProvider;
use Tnt\FlashMessage\Console\Flash;
use Tnt\FlashMessage\Contracts\FlashNotifierInterface;

class FlashMessageServiceProvider extends ServiceProvider
{
    public function boot(ContainerInterface $app)
    {
        if ($app->isRunningInConsole()) {
            Console::registerCommand(Flash::class);
        }
    }

    public function register(ContainerInterface $app)
    {
        $app->singleton(FlashNotifierInterface::class, FlashNotifier::class);

        if ($app->isRunningInConsole()) {
            $app->set(Flash::class, Flash::class);
        }
    }
}