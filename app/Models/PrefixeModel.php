<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeModel extends Model
{
    protected $table = 'prefixe';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $allowedFields = [
        'valeur',
        'id_operateur'
    ];


    public function getAllPrefixes()
    {
        return $this->select('prefixe.*, operateur.nom as operateur')
            ->join(
                'operateur',
                'operateur.id = prefixe.id_operateur',
                'left'
            )
            ->findAll();
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
