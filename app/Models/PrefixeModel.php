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
        'valeur'
    ];

    protected $validationRules = [
        'valeur' => 'required|min_length[2]|max_length[3]'
    ];

    protected $skipValidation = false;


    public function numeroAUnPrefixe(string $numero): bool
    {
        $numero = preg_replace('/\D+/', '', $numero);

        if ($numero === '') {
            return false;
        }

        $prefixeNumero = substr($numero, 0, 3);
        $prefixes = array_column($this->select('valeur')->findAll(), 'valeur');

        return in_array($prefixeNumero, $prefixes, true);
    }

}