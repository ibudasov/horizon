<?php
declare(strict_types=1);

namespace App\Core\Component\Template\Domain;

class TemplateName
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    function getValue(): string
    {
        return $this->name;
    }

    public function __toString()
    {
        return $this->name;
    }


}
