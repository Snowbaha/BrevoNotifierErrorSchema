<?php

namespace App\Notifier;

use Symfony\Component\Notifier\Message\SmsMessage;
use Symfony\Component\Notifier\Notification\Notification;
use Symfony\Component\Notifier\Notification\SmsNotificationInterface;
use Symfony\Component\Notifier\Recipient\SmsRecipientInterface;

class CommandeLivraisonNotification extends Notification implements SmsNotificationInterface
{

    public function asSmsMessage(SmsRecipientInterface $recipient, ?string $transport = null): ?SmsMessage
    {


        $content = sprintf('Commande test',);

        // Avec le transporteur Brevo, c'est le sujet qui est le contenu du SMS
        $this->subject($content)
            ->importance(Notification::IMPORTANCE_HIGH)
            ->emoji('box')
            ->content($content);

        $sms = SmsMessage::fromNotification($this, $recipient);


        return $sms;
    }
}
