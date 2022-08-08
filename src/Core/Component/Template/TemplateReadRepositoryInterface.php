<?php
declare(strict_types=1);

namespace App\Core\Component\Template;

interface TemplateReadRepositoryInterface
{
    /** @return Template[] */
    function allTemplates(): array;
}
