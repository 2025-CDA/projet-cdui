<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
//use Symfony\Component\Routing\Annotation\Route;

final class MailerController extends AbstractController
{
    /**
     * @throws TransportExceptionInterface
     */
    #[Route('/test/mailer', name: 'app_mailer')]
    public function sendTestEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())

            ->from('system-notifications@easypae.test')

            ->to('main.recipient@fake-domain.com')
            ->cc('supervisor.test@company.io')
            ->bcc('admin.archive@internal.local')

            ->subject('Test Email with Multiple Recipients')
            ->text('This email is a test.')
            ->html('<p>This email is a test for main, CC, and BCC recipients.</p>');

        $mailer->send($email);

        return new Response('Le mail a été envoyé, vous pouvez le consulter à :  http://localhost:8025');
    }
}
