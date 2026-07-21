<?php

namespace App\Controllers;

use App\Models\HistoriqueModel;
use App\Models\UtilisateurModel;

class AdminController extends BaseController
{
    public function index(): string
    {
        $utilisateurModel = new UtilisateurModel();
        $historiqueModel = new HistoriqueModel();

        $adminData = [
            'liste' => $utilisateurModel->getAllClients(),
            'clients' => $utilisateurModel->countClients(),
            'gainRetrait' => $historiqueModel->getGainRetrait() ?? 0,
            'gainTransfert' => $historiqueModel->getGainTransfert() ?? 0,
            'gainTotal' => $historiqueModel->getGainRetrait(),
            'gainOperateurs' => $historiqueModel->getGainParOperateur(),
        ];

        return view('admin/dashboard', $adminData);
    }
}
