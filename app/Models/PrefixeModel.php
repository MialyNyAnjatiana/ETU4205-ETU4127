<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeModel extends Model
{
    protected $table = 'prefixe';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'valeur'
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    public function prefixeExiste($prefixe)
    {
        return $this->where('valeur', $prefixe)->first();
    }

        public function getOperateurByNumero($numero)
{
    $prefixe = substr($numero, 0, 3);

    return $this->select('prefixe.*, operateur.nom')
        ->join('operateur', 'operateur.id = prefixe.id_operateur')
        ->where('prefixe.valeur', $prefixe)
        ->first();
}
}
