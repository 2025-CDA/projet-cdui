<?php

namespace App\Controller;

use App\Repository\InfoFormOrganizationRepository;
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

    //maxime

        #[Route('/status/organization/{id}', name: 'app_statu_organizations_form')]
    public function showStatusOrganizationForm(int $id, InfoFormOrganizationRepository $infoFormOrganizationRepository): Response
    {
        $statusForm = $infoFormOrganizationRepository->find($id);
        $statusData = $statusForm -> getStatus();
        return $this->json($statusData);

        dd($statusData);
    }

}
