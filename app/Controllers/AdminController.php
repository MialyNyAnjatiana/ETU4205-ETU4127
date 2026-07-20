<?php

namespace App\Controllers;

use App\Models\FraisModel;
use App\Models\UtilisateurModel;

class AdminController extends BaseController
{
    public function index(): string
    {
        $utilisateurModel = new UtilisateurModel();
        $fraisModel = new FraisModel();

        $adminData = [
            'liste' => $utilisateurModel->getAllClients(),
            'clients' => $utilisateurModel->countClients(),
            'gainRetrait' => $fraisModel->getGainRetrait() ?? 0,
            'gainTransfert' => $fraisModel->getGainTransfert() ?? 0,
            'gainTotal' => $fraisModel->getGainRetrait(),
        ];

        return view('admin/dashboard', $adminData);
    }
}
