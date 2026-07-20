<?php

namespace App\Controllers;

use App\Models\PrefixeModel;
use App\Models\OperateurModel;


class PrefixeController extends BaseController
{

    protected $prefixeModel;
    protected $operateurModel;

    public function __construct()
    {
        $this->prefixeModel = new PrefixeModel();
        $this->operateurModel = new OperateurModel();
    }

    public function index()
    {
        $data = [
            'prefixes' => $this->prefixeModel->getAllPrefixes(),
            'operateurs' => $this->operateurModel->findAll()
        ];

        return view(
            'admin/prefixes',
            $data
        );
    }

    public function add()
    {
        $valeur = $this->request->getPost('valeur');
        $operateur = $this->request->getPost('id_operateur');

        if(!preg_match('/^[0-9]{3}$/',$valeur))
        {
            return redirect()
                ->back()
                ->with('error', 'Préfixe invalide');
        }

        $this->prefixeModel->insert([
            'valeur'=>$valeur,
            'id_operateur'=> empty($operateur) ? null : $operateur
        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Préfixe ajouté'
            );
    }

    public function update($id)
    {

        $this->prefixeModel->update(
            $id,[
                'valeur'=> $this->request->getPost('valeur'),
                'id_operateur'=> $this->request->getPost('id_operateur') ?: null
            ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Préfixe modifié'
            );
    }

    public function delete($id)
    {
        $this->prefixeModel->delete($id);
        return redirect()
            ->back()
            ->with(
                'success',
                'Préfixe supprimé'
            );
    }
}