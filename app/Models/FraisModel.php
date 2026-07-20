<?php

namespace App\Models;

use CodeIgniter\Model;

class FraisModel extends Model
{
    protected $table = 'frais';
    protected $primaryKey = 'id';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';

    protected $allowedFields = [
        'valeur_min',
        'valeur_max',
        'montant_frais',
        'id_type_operation'
    ];

    protected $useTimestamps = false;


    protected $db;


    public function __construct()
    {
        parent::__construct();
        $this->db = \Config\Database::connect();
    }

    public function getGainRetrait()
    {
        return $this->db->table('transaction t')
            ->selectSum('f.montant_frais', 'gain')
            ->join(
                'frais f',
                't.id_type_operation = f.id_type_operation
            AND t.montant >= f.valeur_min
            AND t.montant <= f.valeur_max'
            )
            ->where('t.id_type_operation', 2)
            ->get()
            ->getRowArray();
    }

    public function getGainTransfert()
    {
        return $this->db->table('transaction t')
            ->selectSum('f.montant_frais', 'gain')
            ->join(
                'frais f',
                't.id_type_operation = f.id_type_operation
            AND t.montant >= f.valeur_min
            AND t.montant <= f.valeur_max'
            )
            ->where('t.id_type_operation', 3)
            ->get()
            ->getRowArray();
    }
}
