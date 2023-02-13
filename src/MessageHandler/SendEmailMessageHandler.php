<?php

namespace App\MessageHandler;

use App\Message\SendEmailMessage;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Component\Mailer\Exception\TransportException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class SendEmailMessageHandler implements MessageHandlerInterface
{

    private $params;
    private $mailer;
    public function __construct(ContainerBagInterface $params, MailerInterface $mailer) {
        $this->params = $params;
        $this->mailer = $mailer;
    }

    public function __invoke(SendEmailMessage $message)
    {
        $email = (new TemplatedEmail())
            ->from($this->params->get('system_mail'))
            ->to($message->getEmail())
            ->subject('Test subject')
        ;

        try {
            $this->mailer->send($email);
        }catch (TransportExceptionInterface $e) {

        }
    }
}
