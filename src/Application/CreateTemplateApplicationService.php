<?php
declare(strict_types=1);

namespace App\Application;

use App\Core\Component\Template\CreateTemplateCommand;
use App\Core\Component\Template\TemplateName;
use Symfony\Component\Messenger\MessageBusInterface;

class CreateTemplateApplicationService
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
