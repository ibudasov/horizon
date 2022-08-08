<?php
declare(strict_types=1);

namespace App\Tests;

use App\Application\CreateTemplateApplicationService;
use App\Controller\CreateTemplateRequest;
use App\Presentation\Api\Rest\TemplatesController;
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
        /** @var \App\Presentation\Api\Rest\TemplatesController $controller */
        $controller = (static::getContainer())->get(TemplatesController::class);

        // Act
        $response = $controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('[{"name":"Fake Frikandel"}]', (string)$response->getContent());
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
}
