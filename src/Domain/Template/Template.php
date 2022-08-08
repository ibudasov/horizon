<?php
declare(strict_types=1);

namespace App\Domain\Template;

class Template
{
    private TemplateName $name;

    public function __construct(TemplateName $name)
    {
        $this->name = $name;
    }

    function name(): TemplateName
    {
        return $this->name;
    }


}
