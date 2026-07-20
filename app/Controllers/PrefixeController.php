<?php

namespace App\Controllers;

use App\Models\PrefixeModel;

class PrefixeController extends BaseController
{

    private $prefixeModel;


    public function __construct()
    {
        $this->prefixeModel = new PrefixeModel();
    }


    public function index()
    {
        return view('admin/prefixes', [
            'prefixes' => $this->prefixeModel->findAll()
        ]);
    }


    public function add()
    {
        $valeur = $this->request->getPost('valeur');


        $this->prefixeModel->insert([
            'valeur' => $valeur
        ]);


        return redirect()
            ->back()
            ->with('success', 'Préfixe ajouté');
    }

    public function update($id)
    {
        $this->prefixeModel->update($id, [
            'valeur' => $this->request->getPost('valeur')
        ]);


        return redirect()
            ->back()
            ->with('success', 'Préfixe modifié');
    }

    public function delete($id)
    {
        $this->prefixeModel->delete($id);


        return redirect()
            ->back()
            ->with('success', 'Préfixe supprimé');
    }
}
