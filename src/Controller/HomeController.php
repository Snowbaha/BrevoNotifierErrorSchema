<?php

namespace App\Controller;

use App\Handler\CommandeHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\Serializer\SerializerInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index( SerializerInterface $serializer,CommandeHandler $commandeHandler): JsonResponse
    {
        $commandeLivraisonNotification = $serializer->deserialize('{
              "subject": "Commande n°404 au départ",
              "content": "Commande n°404 au départ ",
              "importance": "high",
              "emoji": "📦",
              "exception": null,
              "exceptionAsString": ""
            }
            ',
            Notification::class,
            'json',
            [AbstractNormalizer::IGNORED_ATTRIBUTES => ['exception']]
        );
        $data['isSuccess'] = $commandeHandler->sendNotificationLivraisonToCommande('0677887577', $commandeLivraisonNotification);

        return $this->json($data);
    }
}
