<?php

namespace App\Controllers;


use App\Models\OperateurModel;



class OperateurController extends BaseController
{
    protected $operateurModel;

    public function __construct()
    {
        $this->operateurModel = new OperateurModel();
    }

    public function index()
    {
        $data = ['operateurs' => $this->operateurModel->findAll()];

        return view('admin/operateurs', $data);

    }

    public function add()
    {
        $nom = $this->request->getPost('nom');
        $commission = $this->request->getPost('pourcentage_comission');

        if(empty($nom))
        {
            return redirect()
                ->back()
                ->with('error', 'Nom opérateur obligatoire');
        }

        $this->operateurModel->insert([
            'nom'=>$nom,
            'pourcentage_comission'=>$commission ?? 0

        ]);

        return redirect()
            ->back()
            ->with('success', 'Opérateur ajouté');
    }

    public function update($id)
    {
        $this->operateurModel->update(

            $id,
            [
                'nom'=> $this->request->getPost('nom'),
                'pourcentage_comission'=> $this->request->getPost('pourcentage_comission')
            ]
        );

        return redirect()
            ->back()
            ->with('success', 'Commission modifiée');
    }

    public function delete($id)
    {
        $this->operateurModel->delete($id);

        return redirect()
            ->back()
            ->with('success', 'Opérateur supprimé');
    }
}