<?php
declare(strict_types=1);

namespace App\Presentation\Api\Rest;

use App\Core\Component\Template\Application\Repository\TemplateRepositoryInterface;
use App\Core\Component\Template\Application\UseCase\CreateTemplateCommand;
use App\Core\Component\Template\Domain\TemplateName;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class TemplatesController extends AbstractController
{
    private TemplateRepositoryInterface $readRepository;
    private MessageBusInterface $messageBus;

    public function __construct(
        TemplateRepositoryInterface $readRepository,
        MessageBusInterface         $messageBus
    )
    {
        $this->readRepository = $readRepository;
        $this->messageBus = $messageBus;
    }

    /**
     * @todo: decouple request and it's validation from the controller
     * @Route("/templates", methods={"POST"})
     */
    function createOne(Request $request): JsonResponse
    {
        $this->messageBus->dispatch(
            new CreateTemplateCommand(
                new TemplateName($request->request->get('name'))
            )
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
