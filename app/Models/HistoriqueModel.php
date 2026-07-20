<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriqueModel extends Model
{
    protected $table = 'historique';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'montant',
        'id_type_operation',
        'date_historique'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    public function getHistoriqueUtilisateur($idUtilisateur)
{
    return $this->select('historique.*, type_operation.nom AS operation')
                ->join('type_operation', 'type_operation.id = historique.id_type_operation')
                ->where('id_utilisateur', $idUtilisateur)
                ->orderBy('date_historique', 'DESC')
                ->findAll();
}

}