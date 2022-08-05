<?php
declare(strict_types=1);

namespace App\Domain\Template;

use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class CreateTemplateService
{
    function createTemplate(): void
    {
        $bus = new MessageBus([
            new HandleMessageMiddleware(new HandlersLocator([
                CreateTemplateCommand::class => [new CreateTemplateHandler()],
            ])),
        ]);

        $bus->dispatch(new CreateTemplateCommand(/* ... */));
    }
}
