<?php

namespace App\Models;

use CodeIgniter\Model;

class PromotionModel extends Model
{
    protected $table = 'promotion';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'pourcentage',
    ];

    protected $returnType = 'array';

    protected $useTimestamps = false;

    public function getAllPromotion()
    {
        return $this->findAll();
    }

    public function getPromotion()
    {
        return $this->find(1) ?? 0;
    }
}