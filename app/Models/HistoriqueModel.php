<?php

namespace App\Models;

use CodeIgniter\Model;

class HistoriqueModel extends Model
{
    protected $table = 'historique';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id_utilisateur',
        'id_destinataire',
        'montant',
        'frais',
        'id_type_operation',
        'date_historique'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

public function getHistoriqueUtilisateur($idUtilisateur)
{
    return $this->db->table('historique h')
        ->select('
            h.*,
            t.nom AS operation,
            u.num_tel AS destinataire
        ')
        ->join('type_operation t', 't.id = h.id_type_operation')
        ->join('utilisateur u', 'u.id = h.id_destinataire', 'left')
        ->where('h.id_utilisateur', $idUtilisateur)
        ->orderBy('h.date_historique', 'DESC')
        ->get()
        ->getResultArray();
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
