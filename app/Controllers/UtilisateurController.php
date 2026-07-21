<?php

namespace App\Controllers;

use App\Models\UtilisateurModel;
use App\Models\SoldeModel;
use App\Models\HistoriqueModel;
use App\Models\TypeOperationModel;
use App\Models\FraisModel;
use App\Models\PrefixeModel;
use App\Models\PromotionModel;

class UtilisateurController extends BaseController
{
    protected $utilisateurModel;
    protected $soldeModel;
    protected $historiqueModel;
    protected $typeOperationModel;
    protected $fraisModel;
    protected $prefixeModel;
    protected $promotionModel;


    public function __construct()
    {
        $this->utilisateurModel = new UtilisateurModel();
        $this->soldeModel = new SoldeModel();
        $this->historiqueModel = new HistoriqueModel();
        $this->typeOperationModel = new TypeOperationModel();
        $this->fraisModel = new FraisModel();
        $this->prefixeModel = new PrefixeModel();
        $this->promotionModel = new PromotionModel();
    }

    public function login()
    {
        return view('login');
    }

    public function connexion()
    {

        $numero = trim($this->request->getPost('numero'));
        if (empty($numero)) {
            return redirect()->back()->with('error', 'Veuillez entrer votre numéro de téléphone.');
        }

        if (!preg_match('/^[0-9]{10}$/', $numero)) {
            return redirect()->back()->with('error', 'Numéro de téléphone invalide. Veuillez entrer un numéro valide.');
        }

        $prefixe = substr($numero, 0, 3);
        $prefixeExiste = $this->prefixeModel
            ->where('valeur', $prefixe)
            ->where('id_operateur', null)
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

        $redirectTo = $utilisateur['role'] === 'administrateur' ? '/admin/dashboard' : '/client/dashboard';
        return redirect()->to($redirectTo);
    }


    public function dashboard()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'client') {
            return redirect()->to('/login');
        }
        $idUtilisateur = session()->get('id_utilisateur');
        $soldeData = $this->soldeModel->getSolde($idUtilisateur);
        $solde = isset($soldeData['montant_dispo']) ? (float) $soldeData['montant_dispo'] : 0;
        return view('client/dashboard', ['solde' => $solde]);
    }

    public function adminDashboard()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'administrateur') {
            return redirect()->to('/login');
        }
        return view('admin/dashboard');
    }


    public function voirSolde()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $model = new SoldeModel();
        $idUtilisateur = session()->get('id_utilisateur');
        $soldeData = $model->getSolde($idUtilisateur);
        $solde = isset($soldeData['montant_dispo']) ? (float) $soldeData['montant_dispo'] : 0;
        return view('client/solde', ['solde' => $solde]);
    }


    public function depot()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        if ($this->request->getMethod() === 'GET') {
            return view('client/depot');
        }
        $montant = (float) $this->request->getPost('montant');
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

        $typeOperation = $this->typeOperationModel->where('nom', 'Dépôt')->first();
        if (!$typeOperation) {
            return redirect()->back()->with('error', 'Type d\'opération dépôt non trouvé.');
        }
        $this->historiqueModel->insert([
            'id_utilisateur' => $idUtilisateur,
            'id_destinataire' => null,
            'montant' => $montant,
            'frais' => 0,
            'id_type_operation' => $typeOperation['id'],
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

        $montant = (float) $this->request->getPost('montant');

        if ($montant <= 0) {
            return redirect()->back()
                ->with('error', 'Montant invalide.');
        }

        $idUtilisateur = session()->get('id_utilisateur');

        $solde = $this->soldeModel->getSolde($idUtilisateur);

        if (!$solde) {
            return redirect()->back()
                ->with('error', 'Solde introuvable.');
        }

        $type = $this->typeOperationModel
            ->where('nom', 'Retrait')
            ->first();

        $frais = $this->fraisModel->getFrais($montant, $type['id']);

        $montantFrais = $frais
            ? $frais['montant_frais']
            : 0;

        $total = $montant + $montantFrais;

        if ($solde['montant_dispo'] < $total) {
            return redirect()->back()
                ->with('error', 'Solde insuffisant.');
        }

        $this->soldeModel->updateSolde(
            $idUtilisateur,
            $solde['montant_dispo'] - $total
        );


        if (!$type) {
            return redirect()->back()
                ->with('error', 'Le type d\'opération "retrait" est introuvable.');
        }

        $this->historiqueModel->insert([
            'id_utilisateur' => $idUtilisateur,
            'id_destinataire' => null,
            'montant' => $montant,
            'frais' => $montantFrais,
            'id_type_operation' => $type['id'],
            'date_historique' => date('Y-m-d H:i:s')
        ]);

        return redirect()
            ->to('/client/solde')
            ->with(
                'success',
                'Retrait effectué avec succès.'
            );
    }

    public function transfert()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $promotion = $this->promotionModel->getPromotion();

        if ($this->request->getMethod() === 'GET') {

            return view('client/transfert', $promotion);
        }

        $liste = trim($this->request->getPost('beneficiaires'));
        $montant = (float) $this->request->getPost('montant');
        $modeFrais = $this->request->getPost('frais');

        if ($montant <= 0) {
            return redirect()->back()->with('error', 'Montant invalide.');
        }

        $numeros = array_filter(array_map('trim', explode(',', $liste)));

        if (count($numeros) == 0) {
            return redirect()->back()->with('error', 'Aucun bénéficiaire.');
        }

        $idExpediteur = session()->get('id_utilisateur');



        $soldeExp = $this->soldeModel->getSolde($idExpediteur);

        if (!$soldeExp) {
            return redirect()->back()->with('error', 'Solde introuvable.');
        }

        $type = $this->typeOperationModel
            ->where('nom', 'Transfert')
            ->first();

        if (!$type) {
            return redirect()->back()->with('error', 'Type Transfert introuvable.');
        }

        $partMontant = $montant / count($numeros);


        $frais = $this->fraisModel->getFrais($montant, $type['id']);

        $montantFrais = $frais ? $frais['montant_frais'] : 0;

        if ($promotion > 0) {
            $montantPromo = $montantFrais * $promotion['pourcentage']/100;
            $montantFrais -= $montantPromo;
        }

        $partFrais = $montantFrais / count($numeros);

        if ($modeFrais == "apart") {

            $debitTotal = $montant + $montantFrais;
            $creditParPersonne = $partMontant;

        } else {

            $debitTotal = $montant;
            $creditParPersonne = $partMontant - $partFrais;

            if ($creditParPersonne <= 0) {
                return redirect()->back()
                    ->with('error', 'Les frais sont supérieurs au montant.');
            }
        }

        if ($soldeExp['montant_dispo'] < $debitTotal) {
            return redirect()->back()->with('error', 'Solde insuffisant.');
        }

        $this->soldeModel->updateSolde(
            $idExpediteur,
            $soldeExp['montant_dispo'] - $debitTotal
        );

        foreach ($numeros as $numero) {

            $destinataire = $this->utilisateurModel->getByNumero($numero);

            if (!$destinataire) {
                continue;
            }

            if ($destinataire['id'] == $idExpediteur) {
                continue;
            }

            $soldeDest = $this->soldeModel->getSolde($destinataire['id']);

            $this->soldeModel->updateSolde(
                $destinataire['id'],
                $soldeDest['montant_dispo'] + $creditParPersonne
            );

            $this->historiqueModel->insert([
                'id_utilisateur' => $idExpediteur,
                'id_destinataire' => $destinataire['id'],
                'montant' => $creditParPersonne,
                'frais' => $partFrais,
                'id_type_operation' => $type['id'],
                'date_historique' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()
            ->to('/client/solde')
            ->with(
                'success',
                count($numeros) . ' transfert(s) effectué(s) avec succès.'
            );
    }

    public function historique()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $idUtilisateur = session()->get('id_utilisateur');

        $historique = $this->historiqueModel
            ->getHistoriqueUtilisateur($idUtilisateur);

        return view('client/historique', [
            'historique' => $historique
        ]);
    }


    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }
}