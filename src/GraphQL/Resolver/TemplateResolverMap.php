<?php
declare(strict_types=1);

namespace App\GraphQL\Resolver;

use App\Core\Component\Template\Application\Repository\Database\TemplateRepository;
use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;
use Overblog\GraphQLBundle\Resolver\ResolverMap;
use ArrayObject;
use GraphQL\Type\Definition\ResolveInfo;
use Overblog\GraphQLBundle\Definition\ArgumentInterface;

class TemplateResolverMap extends ResolverMap
{
    private TemplateRepository $repository;

    public function __construct(TemplateRepository $repository)
    {
        $this->repository = $repository;
    }

    protected function map(): array
    {
        return [
            'RootQuery' => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    if ($info->fieldName === 'templates') {
                        return $this->repository->allTemplates();
                    }
                    return null;
                },
            ],
            'RootMutation' => [
                self::RESOLVE_FIELD => function (
                    $value,
                    ArgumentInterface $args,
                    ArrayObject $context,
                    ResolveInfo $info
                ) {
                    if ($info->fieldName === 'createTemplate') {
                        return new Template(new TemplateName('use repo here!'));
                    }
                    return null;
                },
            ],
        ];
    }
}
