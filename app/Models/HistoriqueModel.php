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
        'frais',
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

    public function getGainRetrait()
    {
        return $this->selectSum('frais', 'gain')
            ->where('id_type_operation', 2)
            ->get()
            ->getRowArray();
    }


    public function getGainTransfert()
    {
        return $this->selectSum('frais', 'gain')
            ->where('id_type_operation', 3)
            ->get()
            ->getRowArray();
    }

    public function getGainParOperateur()
{
    return $this->db->table('historique h')
        ->select("o.nom as operateur, SUM(h.frais) as gain")
        ->join('utilisateur u', 'u.id = h.id_utilisateur')
        ->join('prefixe p', 'SUBSTR(u.num_tel,1,3) = p.valeur')
        ->join('operateur o', 'o.id = p.id_operateur')
        ->where('o.id IS NOT NULL')
        ->groupBy('o.id')
        ->get()
        ->getResultArray();
}
}
