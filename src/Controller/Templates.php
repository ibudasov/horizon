<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class Templates
{
    /**
     * @todo: decouple request and it's validation from the controller
     * @Route("/templates", methods={"POST"})
     */
    function createOne(Request $request): Response
    {
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
