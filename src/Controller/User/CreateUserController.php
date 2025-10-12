<?php

declare(strict_types=1);

namespace App\Controller\User;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CreateUserController extends AbstractController
{
    #[Route('/create-user')]
    public function index(): Response
    {
        return $this->render('create_user/index.html.twig');
    }
}
