<?php

namespace App\Controllers;

use App\Models\FraisModel;

class FraisController extends BaseController
{
    protected $fraisModel;

    public function __construct()
    {
        $this->fraisModel = new FraisModel();
    }

    public function add()
    {

        $data = [
            'valeur_min' => $this->request->getPost('valeur_min'),
            'valeur_max' => $this->request->getPost('valeur_max'),
            'montant_frais' => $this->request->getPost('montant_frais'),
            'id_type_operation' => $this->request->getPost('id_type_operation')
        ];

        $this->fraisModel->insert($data);

        return redirect()
            ->back()
            ->with('success', 'Frais ajouté');
    }

    public function update($id)
    {
        $this->fraisModel->update(
            $id,
            ['montant_frais' => $this->request->getPost('montant_frais')]
        );
        return redirect()
            ->back()
            ->with(
                'success',
                'Frais modifié'
            );
    }

    public function delete($id)
    {
        $this->fraisModel->delete($id);
        return redirect()
            ->back()
            ->with(
                'success',
                'Frais supprimé'
            );
    }
}
