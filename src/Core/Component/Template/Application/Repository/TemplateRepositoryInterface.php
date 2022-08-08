<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\Repository;

use App\Core\Component\Template\Domain\Template;

interface TemplateRepositoryInterface
{
    /** @return Template[] */
    function allTemplates(): array;
}
