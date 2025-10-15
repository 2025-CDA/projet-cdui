<?php

namespace App\Controller;

use App\Entity\InfoFormIntern;
use App\Repository\InfoFormInternRepository;
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

     #[Route('/status/intern/{id}', name: 'app_status_intern_form')]
    public function showInternStatusForm(int $id, InfoFormInternRepository $infoFormInternRepository): Response
    {
        $statusInternForm = $infoFormInternRepository->find($id);
        $statusData = $statusInternForm -> getStatus();
        return $this->json($statusData);

        dd($statusData);
    }

}
