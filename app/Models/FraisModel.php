<?php

namespace App\Models;

use CodeIgniter\Model;

class FraisModel extends Model
{
    protected $table = 'frais';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'valeur_min',
        'valeur_max',
        'montant_frais'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

public function getFrais($montant, $idTypeOperation)
{
    return $this->where('id_type_operation', $idTypeOperation)
                ->where('valeur_min <=', $montant)
                ->where('valeur_max >=', $montant)
                ->first();
}

    protected $db;


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getGainRetrait()
    {
        return $this->db->table('historique h')
            ->selectSum('f.montant_frais', 'gain')
            ->join(
                'frais f',
                'h.id_type_operation = f.id_type_operation
             AND h.montant >= f.valeur_min
             AND h.montant <= f.valeur_max'
            )
            ->where('h.id_type_operation', 2)
            ->get()
            ->getRowArray();
    }

    public function getGainTransfert()
    {
        return $this->db->table('historique h')
            ->selectSum('f.montant_frais', 'gain')
            ->join(
                'frais f',
                'h.id_type_operation = f.id_type_operation
             AND h.montant >= f.valeur_min
             AND h.montant <= f.valeur_max'
            )
            ->where('h.id_type_operation', 3)
            ->get()
            ->getRowArray();
    }

    public static function getFraisByOperation($idTypeOperation)
    {
        $model = new self();

        return $model->where('id_type_operation', $idTypeOperation)
            ->orderBy('valeur_min', 'ASC')
            ->findAll();
    }

    public function getAllFrais()
    {
        return $this->db->table('frais f')
            ->select('
            f.id,
            f.valeur_min,
            f.valeur_max,
            f.montant_frais,
            t.nom as nom_operation
        ')
            ->join(
                'type_operation t',
                't.id = f.id_type_operation'
            )
            ->orderBy('t.id', 'ASC')
            ->orderBy('f.valeur_min', 'ASC')
            ->get()
            ->getResultArray();
    }
}
