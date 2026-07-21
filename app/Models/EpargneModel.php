<?php

namespace App\Models;

use CodeIgniter\Model;

class EpargneModel extends Model
{
    protected $table = 'epargne';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'idUtilisateur',
        'pourcentage',
        'montant',
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    public function getEpargneById($idUtilisateur)
    {
       return $this->where('idUtilisateur', $idUtilisateur)->first();
    }

        public function updateEpargne($idUtilisateur, $nouveauMontant) {
    
        $epargne = $this->getEpargneById($idUtilisateur);
    if ($epargne) {
        $this->update($epargne['id'], [
            'pourcentage' => $nouveauMontant
        ]);
    } else {
        $this->insert([
            'idUtilisateur' => $idUtilisateur,
            'pourcentage' => $nouveauMontant
        ]); 
    }
}

}