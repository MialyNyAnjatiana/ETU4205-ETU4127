<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nom',
        'num_tel',
        'role'
    ];

    protected $returnType = 'array';
    protected $useTimestamps = false;


  
    public function estAdministrateur($userId)
    {
        $user = $this->find($userId);
        return $user && $user['role'] === 'admin';
    }


    public function getAllClients()
    {
        return $this->where('role', 'client')
                    ->join('solde', 'utilisateur.id = solde.id_utilisateur')
                    ->findAll();
    }

    public function countClients()
    {
        return $this->where('role', 'client')->countAllResults();
    }

    public function getByNumero($numero)
{
    return $this->where('num_tel', $numero)->first();
}

}