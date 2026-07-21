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

        $gainRetrait = $historiqueModel->getGainRetrait();
        $gainTransfert = $historiqueModel->getGainTransfert();
        $gainTotal = $historiqueModel->getGainTotal();

        $adminData = [
            'liste' => $utilisateurModel->getAllClients(),
            'clients' => $utilisateurModel->countClients(),
            'gainRetrait' => $gainRetrait ?? 0,
            'gainTransfert' => $gainTransfert ?? 0,
            'gainTotal' => $gainTotal ?? 0,
            'gainOperateurs' => $historiqueModel->getGainParOperateur(),
        ];

        return view('admin/dashboard', $adminData);
    }
}
