<?php
declare(strict_types=1);

namespace App\Infrastructure;

use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;

class TemplateReadRepository implements \App\Core\Component\Template\Domain\TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Production Hagelslaag'))];
    }
}
