<?php

namespace App\Controllers;

use App\Models\PrefixeModel;
use App\Models\SoldeModel;
use App\Models\UtilisateurModel;

class Auth extends BaseController
{
    public function login()
    {
        $utilisateurModel = new UtilisateurModel();
        $soldeModel = new SoldeModel();

        $telephone = $this->request->getPost('telephone');
        $user = $utilisateurModel->where('num_tel', $telephone)->first();

        // Si utilisateur n'existe pas (vérification préfixe + inscription auto)
        if (!$user) {
            $prefixeModel = new PrefixeModel();

            if (! $prefixeModel->numeroAUnPrefixe($telephone)) {
                return redirect()->back()->with('error', 'Préfixe du numéro est invalide');
            }

            $newUser = [
                'nom' => 'Client',
                'num_tel' => $telephone,
                'role' => 'client',
            ];

            if (! $utilisateurModel->insert($newUser)) {
                return redirect()->back()->with('error', 'Impossible de créer le compte client.');
            }

            $userId = $utilisateurModel->getInsertID();
            $newUser = $utilisateurModel->find($userId);

            $soldeModel->insert([
                'id_utilisateur' => $userId,
                'montant_dispo' => 0,
                'date_maj' => date('Y-m-d H:i:s'),
            ]);

            session()->set('user', $newUser);

            return redirect()->to('/');
        }

        session()->set('user', $user);

        if ($user['role'] === 'administrateur') {
            return redirect()->to('/admin');
        }

        return redirect()->to('/');
    }
}
