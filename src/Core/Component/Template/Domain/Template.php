<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Domain;

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
