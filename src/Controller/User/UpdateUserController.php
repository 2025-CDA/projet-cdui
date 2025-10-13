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
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
final class UpdateUserController extends AbstractController
{
    public function __construct(
        private readonly UserPasswordHasherInterface $passwordHasher,
        private readonly EntityManagerInterface $entityManager
    ) {
    }

    // The return type is now explicitly JsonResponse.
    // We receive the User object that API Platform has already loaded and updated.
    public function __invoke( User $user, UrlGeneratorInterface $urlGenerator): JsonResponse
    {
        // --- Step 1: Your custom logic ---
        if ($plainPassword = $user->getPlainPassword()) {
            $hashedPassword = $this->passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
            $user->eraseCredentials();
        }

        // Save the changes to the database.
        $this->entityManager->flush();

        // --- Step 2: Manually create the successful response ---
        $locationUrl = $urlGenerator->generate('_api_/users/{id}{._format}_get', ['id' => $user->getId()]);

        // Use the built-in json() helper from AbstractController.
        return $this->json(
            $user, // The data to serialize
            Response::HTTP_OK, // The 200 OK status code for a successful update
            ['Location' => $locationUrl], // No special headers are needed for a PATCH response
//            ['groups' => 'read:user'] // The serialization group for the response body
        );
    }
}
