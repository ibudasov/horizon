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
    private TemplatesController $controller;

    protected function setUp(): void
    {
        parent::setUp();
        self::bootKernel();
        $this->controller = (static::getContainer())->get(TemplatesController::class);
    }

    /** @test */
    function givenThereIsNoTemplate_whenRequestedToGetThemAll_thenEmptyArrayReturned(): void
    {
        // Act
        $response = $this->controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('[]', (string)$response->getContent());
    }

    /** @test */
    function givenValidRequest_whenRequested_thenNewTemplateIsReturned(): void
    {
        // Arrange
        $createOneTemplateRequest = $this->createTheRequest();

        // Act
        $response = $this->controller->createOne($createOneTemplateRequest);

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $response);
        $this->assertEquals('{"name":"ok"}', $response->getContent());
        $this->assertThereIsOneItemInTheRepo();
    }

    /** @test */
    function givenThereIsATemplate_whenRequestedAllTheTemplates_thenTemplateIsReturned(): void
    {
        // Arrange
        $this->addTemplateToTheStorage();

        // Act
        $retrievedTemplate = $this->controller->returnAllTheTemplates();

        // Assert
        $this->assertInstanceOf(JsonResponse::class, $retrievedTemplate);
        $this->assertEquals('[{"name":"existing template"}]', $retrievedTemplate->getContent());
    }

    public function assertThereIsOneItemInTheRepo(): void
    {
        /** @var TemplateRepositoryInterface $repo */
        $repo = (static::getContainer())->get(TemplateRepositoryInterface::class);
        $this->assertEquals(1, $this->count($repo->allTemplates()));
    }

    public function createTheRequest(): Request
    {
        return Request::create(
            'ok',
            'POST',
            [
                'name' => 'ok'
            ]
        );
    }

    public function addTemplateToTheStorage(): void
    {
        /** @var TemplateRepositoryInterface $repo */
        $repo = (static::getContainer())->get(TemplateRepositoryInterface::class);
        $repo->add(new Template(new TemplateName('existing template')));
    }
}
