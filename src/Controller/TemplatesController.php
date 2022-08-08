<?php
declare(strict_types=1);

namespace App\Controller;

use App\Application\CreateTemplateApplicationService;
use App\Application\TemplateReadRepository;
use App\Domain\Template\TemplateName;
use App\Domain\Template\TemplateReadRepositoryInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TemplatesController extends AbstractController
{
    private TemplateReadRepositoryInterface $readRepository;

    public function __construct(TemplateReadRepositoryInterface $readRepository)
    {
        $this->readRepository = $readRepository;
    }

    /**
     * @todo: decouple request and it's validation from the controller
     * @Route("/templates", methods={"POST"})
     */
    function createOne(Request $request, CreateTemplateApplicationService $createTemplateService): JsonResponse
    {
        $createTemplateService->createTemplate(
            new TemplateName($request->request->get('name'))
        );

        return new JsonResponse([
            'name' => $request->request->get('name'),
        ]);
    }

    /**
     * @Route("/templates", methods={"GET"})
     */
    function returnAllTheTemplates(): JsonResponse
    {
        $response = [];
        foreach ($this->readRepository->allTemplates() as $template) {
            $response[] = ['name' => $template->name()->getValue()];
        }

        return new JsonResponse($response);
    }
}
