<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;
use App\Core\Component\Template\Domain\TemplateReadRepositoryInterface;

class TemplateReadRepositoryFake implements TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Fake Frikandel'))];
    }
}
