<?php

namespace App\Controller;

use App\Repository\InfoFormCompanyRepository;
use App\Repository\InfoFormRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class StatusController extends AbstractController
{
    #[Route('/status/{id}', name: 'app_status_form')]
    public function showStatusForm(int $id, InfoFormRepository $infoFormRepository): Response
    {
        $statusForm = $infoFormRepository->find($id);
        $statusData = $statusForm -> getStatus();
        return $this->json($statusData);

        dd($statusData);
    }

    // julen
    #[Route('/status/company/{id}', name: 'app_status_form_company')]
    public function showStatusCompanyForm(int $id, InfoFormCompanyRepository $infoFormCompanyRepository): Response
    {
        $statusCompanyForm = $infoFormCompanyRepository->find($id);
        $statusCompanyData = $statusCompanyForm -> getStatus();
        return $this->json($statusCompanyData);

        dd($statusCompanyData);
    }
}
