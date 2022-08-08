<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Template\Template;
use App\Domain\Template\TemplateName;
use App\Domain\Template\TemplateReadRepositoryInterface;

class TemplateReadRepositoryFake implements TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Fake Frikandel'))];
    }
}
