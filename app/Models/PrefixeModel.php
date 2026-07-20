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
}
