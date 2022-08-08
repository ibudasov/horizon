<?php
declare(strict_types=1);

namespace App\Domain\Template;

interface TemplateReadRepositoryInterface
{
    /** @return Template[] */
    function allTemplates(): array;
}
