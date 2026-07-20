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
            'clients' => $utilisateurModel->countClients(),
            'gainRetrait' => $fraisModel->getGainRetrait() ?? 0,
            'gainTransfert' => $fraisModel->getGainTransfert() ?? 0,
        ];

        $data = [
            'title' => 'Accueil - Opérateur Mobile Money',
            'content' => view('admin/dashboard', $adminData)
        ];

        return view('layout/main', $data);
    }
}
