<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\Repository\Database;

use App\Core\Component\Template\Application\Repository\TemplateRepositoryInterface;
use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;

class TemplateRepositoryFake implements TemplateRepositoryInterface
{
    /** @var Template[] */
    private array $templatesStorage;

    public function __construct(array $templatesStorage = [])
    {
        $this->templatesStorage = $templatesStorage;
    }

    function add(Template $template): void
    {
        $this->templatesStorage[] = $template;
    }

    function allTemplates(): array
    {
        return $this->templatesStorage;
    }
}
