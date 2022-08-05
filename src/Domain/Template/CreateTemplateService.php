<?php
declare(strict_types=1);

namespace App\Domain\Template;

use Symfony\Component\Messenger\MessageBusInterface;

class CreateTemplateService
{
    private MessageBusInterface $messageBus;

    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    function createTemplate(TemplateName $name): void
    {
        $this->messageBus->dispatch(new CreateTemplateCommand($name));
    }
}
