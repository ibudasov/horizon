<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\Repository\Database;

use App\Core\Component\Template\Application\Repository\TemplateReadRepositoryInterface;
use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;

class TemplateReadRepositoryFake implements TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Fake Frikandel'))];
    }
}
