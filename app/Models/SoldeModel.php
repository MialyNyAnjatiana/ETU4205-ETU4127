<?php

namespace App\Models;

use CodeIgniter\Model;

class SoldeModel extends Model
{
    protected $table = 'solde';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'montant_dispo',
        'date_maj'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    public function getSolde($idUtilisateur)
{
    return $this->where('id_utilisateur', $idUtilisateur)->first();
}

    public function updateSolde($idUtilisateur, $nouveauMontant) {
    $solde = $this->getSolde($idUtilisateur);
    if ($solde) {
        $this->update($solde['id'], [
            'montant_dispo' => $nouveauMontant,
            'date_maj' => date('Y-m-d H:i:s')
        ]);
    } else {
        $this->insert([
            'id_utilisateur' => $idUtilisateur,
            'montant_dispo' => $nouveauMontant,
            'date_maj' => date('Y-m-d H:i:s')
        ]); 
    }
}

}