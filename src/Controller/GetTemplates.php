<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GetTemplates
{
    /**
     * @Route("/templates")
     */
    function all(): Response
    {
        return new JsonResponse([
            'ok' => 'ok',
            'no' => 'no'
        ]);
    }
}
