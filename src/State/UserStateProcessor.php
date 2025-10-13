<?php
//
//namespace App\State;
//
//use ApiPlatform\Metadata\Operation;
//use ApiPlatform\State\ProcessorInterface;
//use App\Entity\User;
//use Symfony\Component\Mailer\MailerInterface;
//use Symfony\Component\Mime\Email;
//
//final readonly class UserStateProcessor implements ProcessorInterface
//{
//    public function __construct(
//        private ProcessorInterface $persistProcessor,
//        private MailerInterface $mailer
//    ) {
//    }
//
//    public function process(mixed $data, Operation $operation, array $uriVariables = [], array $context = []): mixed
//    {
//        $persistedUser = $this->persistProcessor->process($data, $operation, $uriVariables, $context);
//
//        if ($persistedUser instanceof User) {
//            $message = (new Email())
//                ->from('registration@easypae.com')
//                ->to($persistedUser->getEmail())
//                ->subject('A new user account has been created')
//                ->text(sprintf('The user #%d has been created.', $persistedUser->getId()));
//
//            $this->mailer->send($message);
//        }
//
//        return $persistedUser;
//    }
//}
