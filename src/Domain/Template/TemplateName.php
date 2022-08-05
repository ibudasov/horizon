<?php
declare(strict_types=1);

namespace App\Domain\Template;

class TemplateName
{
    /** @var string */
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    function getValue(): string
    {
        return $this->name;
    }


}
