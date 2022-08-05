<?php
declare(strict_types=1);

namespace App\Controller;

use App\Domain\Template\CreateTemplateService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class Templates extends AbstractController
{
    /**
     * @todo: decouple request and it's validation from the controller
     * @Route("/templates", methods={"POST"})
     */
    function createOne(Request $request, CreateTemplateService $createTemplateService): Response
    {
        $createTemplateService->createTemplate();

        return new JsonResponse([
            'name' => $request->request->get('name'),
        ]);
    }

    /**
     * @Route("/templates", methods={"GET"})
     */
    function returnAllTheTemplates(): Response
    {
        return new JsonResponse([
            'ok' => 'ok',
            'no' => 'no'
        ]);
    }
}
