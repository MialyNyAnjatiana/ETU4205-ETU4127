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

    public function getFrais($montant)
{
    return $this->where('valeur_min <=', $montant)
                ->where('valeur_max >=', $montant)
                ->first();
}

}