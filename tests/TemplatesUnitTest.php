<?php
declare(strict_types=1);

namespace App\Tests;

use App\Application\CreateTemplateApplicationService;
use App\Controller\CreateTemplateRequest;
use App\Core\Component\Template\Application\Repository\TemplateRepositoryInterface;
use App\Core\Component\Template\Domain\Template;
use App\Core\Component\Template\Domain\TemplateName;
use App\Presentation\Api\Rest\TemplatesController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TemplatesUnitTest extends KernelTestCase
{
    /** @test */
    function givenThereIsNoTemplate_whenRequestedToGetThemAll_thenEmptyArrayReturned(): void
    {
        // Arrange
        self::bootKernel();
        /** @var \App\Presentation\Api\Rest\TemplatesController $controller */
        $controller = (static::getContainer())->get(TemplatesController::class);

        // Act
        $response = $controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('[]', (string)$response->getContent());
    }

    /** @test */
    function givenValidRequest_whenRequested_thenNewTemplateIsReturned(): void
    {
        // Arrange
        self::bootKernel();
        /** @var \App\Presentation\Api\Rest\TemplatesController $controller */
        $controller = (static::getContainer())->get(TemplatesController::class);

        $createOneRequest = Request::create(
            'ok',
            'POST',
            [
                'name' => 'ok'
            ]
        );

        // Act
        $response = $controller->createOne($createOneRequest);

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('{"name":"ok"}', $response->getContent());
    }

    /** @test */
    function givenThereIsATemplate_whenRequestedAllTheTemplates_thenTemplateIsReturned(): void
    {
        // Arrange
        self::bootKernel();
        /** @var \App\Presentation\Api\Rest\TemplatesController $controller */
        $controller = (static::getContainer())->get(TemplatesController::class);
        /** @var TemplateRepositoryInterface $repo */
        $repo = (static::getContainer())->get(TemplateRepositoryInterface::class);
        $repo->add(new Template(new TemplateName('existing template')));

        // Act
        $retrievedTemplate = $controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $retrievedTemplate);
        $this->assertEquals('[{"name":"existing template"}]', $retrievedTemplate->getContent());
    }
}
