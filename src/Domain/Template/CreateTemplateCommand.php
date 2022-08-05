<?php
declare(strict_types=1);

namespace App\Domain\Template;

class CreateTemplateCommand
{
    /** @var TemplateName */
    private $name;

    public function __construct(TemplateName $name)
    {
        $this->name = $name;
    }

    function getName(): TemplateName
    {
        return $this->name;
    }
}
