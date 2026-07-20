<?php

namespace App\Models;

use CodeIgniter\Model;

class UtilisateurModel extends Model
{
    protected $table = 'utilisateur';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nom',
        'num_tel',
        'role',
        'created_at'
    ];

    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = '';
    protected $deletedField = '';

    protected $validationRules = [
        'nom' => 'required|min_length[2]|max_length[100]',
        'num_tel' => 'required|min_length[10]|max_length[15]|is_unique[utilisateur.num_tel,id,{id}]',
        'role' => 'permit_empty|in_list[client,administrateur]'
    ];

    
    protected $skipValidation = false;

  
    public function estAdministrateur($userId)
    {
        $user = $this->find($userId);
        return $user && $user['role'] === 'administrateur';
    }


    public function getAllClients()
    {
        return $this->where('role', 'client')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    /**
     * Récupère le nombre total de clients
     */
    public function countClients()
    {
        return $this->where('role', 'client')->countAllResults();
    }

}