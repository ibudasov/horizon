<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\UseCase;

use Psr\Log\LoggerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class CreateTemplateHandler implements MessageHandlerInterface
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(CreateTemplateCommand $createTemplateCommand)
    {
        $this->logger->info($createTemplateCommand->getName()->getValue());
    }
}
