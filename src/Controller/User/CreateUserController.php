<?php

namespace App\Controller\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\HttpKernel\Attribute\MapRequestPayload;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsController]
final class CreateUserController extends AbstractController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    public function __invoke(#[MapRequestPayload] User $user, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        if ($plainPassword = $user->getPlainPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
            $user->eraseCredentials();
        }

        $user->setRoles(['ROLE_USER']);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $locationUrl = $urlGenerator->generate('_api_/users/{id}{._format}_get', ['id' => $user->getId()]);

        return $this->json(
            $user, // The data to serialize
            Response::HTTP_CREATED, // The 201 status code
            ['Location' => $locationUrl], // The required "Location" header
//            ['groups' => 'read:user'] // The serialization group to use for the response body
        );
    }
}
