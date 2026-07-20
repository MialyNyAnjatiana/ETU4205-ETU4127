<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\SoldeModel;
use App\Models\HistoriqueModel;
use App\Models\TypeOperationModel;
use App\Models\FraisModel;
use App\Models\PrefixeModel;

class UtilisateurController extends BaseController
{
    protected $utilisateurModel;
    protected $soldeModel;
    protected $historiqueModel;
    protected $typeOperationModel;
    protected $fraisModel;
    protected $prefixeModel;

    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $this->soldeModel = new SoldeModel();
        $this->historiqueModel = new HistoriqueModel();
        $this->typeOperationModel = new TypeOperationModel();
        $this->fraisModel = new FraisModel();
        $this->prefixeModel = new PrefixeModel();
    }


    public function login()
    {
        return view('login');
    }


    public function connexion() {

        $numero = trim($this->request->getPost('numero'));
        if(empty($numero)) {
            return redirect()->back()->with('error', 'Veuillez entrer votre numéro de téléphone.');
        }

        if(!preg_match('/^[0-9]{10}$/', $numero)) {
            return redirect()->back()->with('error', 'Numéro de téléphone invalide. Veuillez entrer un numéro valide.');
        }

        $prefixe = substr($numero, 0, 3);
        $prefixeExiste = $this->prefixeModel
        ->where('valeur', $prefixe)
        ->first();

        if (!$prefixeExiste) {
            return redirect()->back()->with('error', 'Le préfixe du numéro de téléphone est invalide.');
        }

        $utilisateur = $this->utilisateurModel->getByNumero($numero);
        if (!$utilisateur) {
            $this->utilisateurModel->insert([
                'num_tel' => $numero,
                'role' => 'client'
            ]);
            $utilisateur = $this->utilisateurModel->getByNumero($numero);
            $this->soldeModel->insert([
                'id_utilisateur' => $utilisateur['id'],
                'montant_dispo' => 0,
                'date_maj' => date('Y-m-d H:i:s')
            ]);
            $utilisateur = $this->utilisateurModel->getByNumero($numero);
        }

        session()->set([
            'id_utilisateur' => $utilisateur['id'],
            'num_tel' => $utilisateur['num_tel'],
            'role' => $utilisateur['role'],
            'isLoggedIn' => true
        ]);

        $redirectTo = $utilisateur['role'] === 'admin' ? '/admin/dashboard' : '/client/dashboard';
        return redirect()->to($redirectTo);
    }


    public function dashboard() {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'client') {
            return redirect()->to('/login');
        }
        $idUtilisateur = session()->get('id_utilisateur');
        $soldeData = $this->soldeModel->getSolde($idUtilisateur);
        $solde = isset($soldeData['montant_dispo']) ? (float) $soldeData['montant_dispo'] : 0;
        return view('client/dashboard', ['solde' => $solde]);
    }

    public function adminDashboard() {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/login');
        }
        return view('admin/dashboard');
    }


    public function voirSolde() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $model = new SoldeModel();
        $idUtilisateur = session()->get('id_utilisateur');
        $soldeData = $model->getSolde($idUtilisateur);
        $solde = isset($soldeData['montant_dispo']) ? (float) $soldeData['montant_dispo'] : 0;
        return view('client/solde', ['solde' => $solde]);
    }


    public function depot() {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'GET') {
            return view('client/depot');
        }
        $montant = (float)$this->request->getPost('montant');
        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Montant invalide.');
        }

        $idUtilisateur = session()->get('id_utilisateur');
        $soldeActuel = $this->soldeModel->getSolde($idUtilisateur);
        if (!$soldeActuel) {
            return redirect()->back()->with('error', 'Solde non trouvé.');
        }
        $nouveauMontant = $soldeActuel['montant_dispo'] + $montant;
        $this->soldeModel->updateSolde($idUtilisateur, $nouveauMontant);

        $typeOperation = $this->typeOperationModel->where('nom', 'depot')->first();
        if (!$typeOperation) {
            return redirect()->back()->with('error', 'Type d\'opération dépôt non trouvé.');
        }
        $this->historiqueModel->insert([
            'id_utilisateur' => $idUtilisateur, 
            'id_type_operation' => $typeOperation['id'],
            'montant' => $montant,
            'date_historique' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/client/solde')->with('success', 'Dépôt effectué avec succès.');
    }


public function retrait()
{
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }


    if ($this->request->getMethod() === 'GET') {
        return view('client/retrait');
    }


    $beneficiaire = trim($this->request->getPost('beneficiaire'));
    $montant = (float)$this->request->getPost('montant');


    if ($montant <= 0) {
        return redirect()->back()->with('error','Montant invalide');
    }


    $idExpediteur = session()->get('id_utilisateur');


    $destinataire = $this->utilisateurModel
        ->getByNumero($beneficiaire);


    if (!$destinataire) {
        return redirect()->back()
        ->with('error','Le bénéficiaire n existe pas');
    }


    $soldeExpediteur = $this->soldeModel
        ->getSolde($idExpediteur);


    $frais = $this->fraisModel->getFrais($montant);


    $montantFrais = $frais ? $frais['montant_frais'] : 0;


    $totalDebit = $montant + $montantFrais;



    if ($soldeExpediteur['montant_dispo'] < $totalDebit) {

        return redirect()->back()
        ->with('error','Solde insuffisant');
    }



    $nouveauSoldeExp =
    $soldeExpediteur['montant_dispo']
    - $totalDebit;


    $this->soldeModel
    ->updateSolde(
        $idExpediteur,
        $nouveauSoldeExp
    );


    $soldeDest =
    $this->soldeModel
    ->getSolde($destinataire['id']);



    $nouveauSoldeDest =
    $soldeDest['montant_dispo']
    + $montant;


    $this->soldeModel
    ->updateSolde(
        $destinataire['id'],
        $nouveauSoldeDest
    );


    $type =
    $this->typeOperationModel
    ->where('nom','retrait')
    ->first();


    $this->historiqueModel->insert([

        'id_utilisateur'=>$idExpediteur,

        'id_type_operation'=>$type['id'],

        'montant'=>$montant,

        'date_historique'=>date('Y-m-d H:i:s')
    ]);



    return redirect()
    ->to('/client/solde')
    ->with(
        'success',
        'Retrait envoyé avec succès'
    );

}
    
public function transfert() {

if (!session()->get('isLoggedIn')) {
return redirect()->to('/login');
}



if($this->request->getMethod()==='GET')
{
return view('client/transfert');
}



$beneficiaire =
$this->request->getPost('beneficiaire');


$montant =
(float)$this->request->getPost('montant');


$modeFrais =
$this->request->getPost('frais');



$destinataire =
$this->utilisateurModel
->getByNumero($beneficiaire);



if(!$destinataire)
{
return redirect()->back()
->with('error','Utilisateur introuvable');
}



$idExpediteur =
session()->get('id_utilisateur');



$soldeExp =
$this->soldeModel
->getSolde($idExpediteur);



$frais =
$this->fraisModel
->getFrais($montant);



$montantFrais =
$frais ? $frais['montant_frais'] : 0;



if($modeFrais=="apart")
{

$debit =
$montant+$montantFrais;


$credit =
$montant;


}
else
{

$debit =
$montant;


$credit =
$montant-$montantFrais;

}



if($soldeExp['montant_dispo']<$debit)
{

return redirect()->back()
->with('error','Solde insuffisant');

}



$this->soldeModel
->updateSolde(
$idExpediteur,
$soldeExp['montant_dispo']-$debit
);



$soldeDest =
$this->soldeModel
->getSolde($destinataire['id']);



$this->soldeModel
->updateSolde(
$destinataire['id'],
$soldeDest['montant_dispo']+$credit
);



return redirect()
->to('/client/solde')
->with('success','Transfert effectué');

}

    public function historique()
    {

    }


    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}