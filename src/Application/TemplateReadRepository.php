<?php
declare(strict_types=1);

namespace App\Application;

use App\Domain\Template\Template;
use App\Domain\Template\TemplateName;

class TemplateReadRepository implements \App\Domain\Template\TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Production Hagelslaag'))];
    }
}
