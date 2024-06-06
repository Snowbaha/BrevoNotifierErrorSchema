<?php

namespace App\Handler;


use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\NotifierInterface;
use Symfony\Component\Notifier\Recipient\Recipient;

readonly class CommandeHandler
{
    public function __construct(
        private NotifierInterface $notifier,
    ) {
    }

    /**
     * Maj commande
     */


    public function sendNotificationLivraisonToCommande(string $telephone, Notification $notification): bool
    {
       $this->notifier->send($notification, new Recipient('',  $telephone));

       return true;

    }
}
