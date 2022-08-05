<?php
declare(strict_types=1);

namespace App\Domain\Template;

use Psr\Log\LoggerInterface;

class CreateTemplateHandler
{
    /** @var LoggerInterface */
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function __invoke(CreateTemplateCommand $createTemplateCommand)
    {
        $this->logger->info($createTemplateCommand->getName()->getValue());
    }
}
