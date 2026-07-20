<?php

namespace App\Models;

use CodeIgniter\Model;

class PrefixeModel extends Model
{
    protected $table = 'prefixe';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'prefixe'
    ];

    protected $validationRules = [
        'prefixe' => 'required|min_length[2]|max_length[100]'
    ];

    
    
    protected $skipValidation = false;


}