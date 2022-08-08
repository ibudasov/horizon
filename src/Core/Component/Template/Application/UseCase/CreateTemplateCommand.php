<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Application\UseCase;

use App\Core\Component\Template\Domain\TemplateName;

class CreateTemplateCommand
{
    private TemplateName $name;

    public function __construct(TemplateName $name)
    {
        $this->name = $name;
    }

    function getName(): TemplateName
    {
        return $this->name;
    }
}
