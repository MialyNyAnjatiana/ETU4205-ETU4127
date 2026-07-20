<?php

namespace App\Controllers;

use App\Models\PrefixeModel;
use App\Models\UtilisateurModel;

class Auth extends BaseController
{
    public function login()
    {
        $utilisateurModel = new UtilisateurModel();

        $telephone = $this->request->getPost('telephone');
        $user = $utilisateurModel->where('num_tel', $telephone)->first();

        // Si utilisateur n'existe pas (vérification préfixe + inscription auto)
        if (!$user) {
            $prefixeModel = new PrefixeModel();

            if (! $prefixeModel->numeroAUnPrefixe($telephone)) {
                return redirect()->back()->with('error', 'Préfixe du numéro est invalide');
            }

            $newUser = [
                'num_tel' => $telephone,
            ];

            $utilisateurModel->insert($newUser);

            $userId = $utilisateurModel->getInsertID();
            $newUser = $utilisateurModel->find($userId);
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
