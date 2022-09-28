<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\Repository\Database;

use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;

class TemplateRepository implements \App\Core\Component\Template\Application\Repository\TemplateRepositoryInterface
{
    /** @var Template[] */
    private array $templatesStorage;

    public function __construct(array $templatesStorage = [])
    {
        $this->templatesStorage = $templatesStorage;
        $this->add(new Template(new TemplateName('banaan')));
        $this->add(new Template(new TemplateName('meatballs')));
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
