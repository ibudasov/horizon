<?php
declare(strict_types=1);

namespace App\Application;

use App\Core\Component\Template\Template;
use App\Core\Component\Template\TemplateName;

class TemplateReadRepository implements \App\Core\Component\Template\TemplateReadRepositoryInterface
{
    function allTemplates(): array
    {
        return [new Template(new TemplateName('Production Hagelslaag'))];
    }
}
