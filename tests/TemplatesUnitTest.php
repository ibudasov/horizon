<?php
declare(strict_types=1);

namespace App\Tests;

use App\Application\CreateTemplateApplicationService;
use App\Controller\CreateTemplateRequest;
use App\Controller\TemplatesController;
use App\Domain\Template\TemplateReadRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TemplatesUnitTest extends KernelTestCase
{
    /** @test */
    function given_when_thenAll(): void
    {
        // Arrange
        self::bootKernel();
        /** @var TemplatesController $controller */
        $controller = (static::getContainer())->get(TemplatesController::class);
        $repo = (static::getContainer())->get(TemplateReadRepositoryInterface::class);

        // Act
        $response = $controller->returnAllTheTemplates($repo);

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('[{"name":"Hagelslaag"}]', (string)$response->getContent());
    }

    /** @test */
    function givenValidRequest_whenRequested_thenNewTemplateIsReturned(): void
    {
        // Arrange
        self::bootKernel();

        /** @var CreateTemplateApplicationService $createTemplateService */
        $createTemplateService = (static::getContainer())->get(CreateTemplateApplicationService::class);

        $controller = new TemplatesController();
        $createOneRequest = Request::create(
            'ok',
            'POST',
            [
                'name' => 'ok'
            ]
        );

        // Act
        $response = $controller->createOne(
            $createOneRequest,
                $createTemplateService
        );

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('{"name":"ok"}', $response->getContent());
    }
}
