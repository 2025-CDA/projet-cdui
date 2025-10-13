<?php

namespace App\Controller;

use App\Entity\Company;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpKernel\Attribute\AsController;

#[AsController]
class CreateCompanyPublication extends AbstractController
{
    public function __construct(
//        private BookPublishingHandler $bookPublishingHandler
    ) {}

    public function __invoke(Company $company): Company
    {
//        $this->bookPublishingHandler->handle($company);

        return $company;
    }
}
