<?php

namespace App\Controller\User;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Attribute\AsController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Serializer\Exception\ExceptionInterface;
use Symfony\Component\Serializer\SerializerInterface;

#[AsController]
final class UpdateUserController extends AbstractController
{
    // We only need the Serializer here, no other services in the constructor
    public function __construct(private readonly SerializerInterface $serializer)
    {
    }

    // We get the User from the URL, the Request object, and the Hasher + EntityManager services

    /**
     * @throws ExceptionInterface
     */
    public function __invoke(
        User $user, // Loaded by Doctrine from the {id} in the URL
        Request $request,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): JsonResponse {
        // --- Step 1: Manually apply the JSON patch to the User object ---

        // Get the raw JSON from the request body
        $json = $request->getContent();

        // Use the serializer to deserialize the JSON *onto the existing* $user object.
        // This is the most crucial step.
        $this->serializer->deserialize($json, User::class, 'json', [
            'object_to_populate' => $user,
            'groups' => 'update:user' // Use the correct group for writing
        ]);

        // --- Step 2: Now, your custom logic will work ---

        // $user->getPlainPassword() will now return "canari83"
        if ($plainPassword = $user->getPlainPassword()) {
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);
            $user->eraseCredentials();
        }

        // Save the changes. Doctrine will now see that the 'password' field has changed.
        $entityManager->flush();

        // --- Step 3: Manually create the successful response ---
        return $this->json(
            $user, // The now-updated user object to serialize
            Response::HTTP_OK,
            [], // No Location header is needed for a 200 OK
            ['groups' => 'read:user'] // Use the correct group for reading
        );
    }
}
