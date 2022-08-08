<?php
declare(strict_types=1);

namespace App\Tests\Controller;

use App\Application\CreateTemplateApplicationService;
use App\Controller\CreateTemplateRequest;
use App\Controller\TemplatesController;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class TemplatesTest extends KernelTestCase
{
    /** @test */
    function given_when_thenAll(): void
    {
        // Arrange
        $controller = new TemplatesController();

        // Act
        $response = $controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
    }

    /** @test */
    function givenValidRequest_whenRequested_thenNewTemplateIsReturned(): void
    {
        // Arrange
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
            new CreateTemplateApplicationService()
        );

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('{"name":"ok"}', $response->getContent());
    }
}
