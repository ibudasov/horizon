<?php
declare(strict_types=1);

namespace App\Domain\Template;

use Psr\Log\LoggerInterface;
use Symfony\Component\HttpKernel\Log\Logger;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

class CreateTemplateService
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    function createTemplate(TemplateName $name): void
    {
        $bus = new MessageBus([
            new HandleMessageMiddleware(new HandlersLocator([
                CreateTemplateCommand::class => [new CreateTemplateHandler($this->logger)],
            ])),
        ]);

        $bus->dispatch(new CreateTemplateCommand($name));
    }
}
