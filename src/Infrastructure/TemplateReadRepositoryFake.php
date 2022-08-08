<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Core\Component\Template\Template;
use App\Core\Component\Template\TemplateName;
use App\Core\Component\Template\TemplateReadRepositoryInterface;

class TemplateReadRepositoryFake implements TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Fake Frikandel'))];
    }
}