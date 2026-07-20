<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->db->transStart();

        $this->db->table('historique')->emptyTable();
        $this->db->table('solde')->emptyTable();
        $this->db->table('frais')->emptyTable();
        $this->db->table('type_operation')->emptyTable();
        $this->db->table('utilisateur')->emptyTable();
        $this->db->table('prefixe')->emptyTable();

        $this->db->table('prefixe')->insertBatch([
            ['valeur' => '032'],
            ['valeur' => '033'],
            ['valeur' => '034'],
            ['valeur' => '038'],
        ]);

        $this->db->table('type_operation')->insertBatch([
            ['nom' => 'Dépôt'],
            ['nom' => 'Retrait'],
            ['nom' => 'Transfert'],
        ]);

        $this->db->table('frais')->insertBatch([
            ['valeur_min' => 0, 'valeur_max' => 1000, 'montant_frais' => 0, 'id_type_operation' => 1],
            ['valeur_min' => 1001, 'valeur_max' => 5000, 'montant_frais' => 0, 'id_type_operation' => 1],
            ['valeur_min' => 5001, 'valeur_max' => 20000, 'montant_frais' => 0, 'id_type_operation' => 1],
            ['valeur_min' => 20001, 'valeur_max' => 1000000, 'montant_frais' => 0, 'id_type_operation' => 1],
            ['valeur_min' => 0, 'valeur_max' => 1000, 'montant_frais' => 50, 'id_type_operation' => 2],
            ['valeur_min' => 1001, 'valeur_max' => 5000, 'montant_frais' => 100, 'id_type_operation' => 2],
            ['valeur_min' => 5001, 'valeur_max' => 20000, 'montant_frais' => 200, 'id_type_operation' => 2],
            ['valeur_min' => 20001, 'valeur_max' => 1000000, 'montant_frais' => 500, 'id_type_operation' => 2],
            ['valeur_min' => 0, 'valeur_max' => 1000, 'montant_frais' => 50, 'id_type_operation' => 3],
            ['valeur_min' => 1001, 'valeur_max' => 5000, 'montant_frais' => 100, 'id_type_operation' => 3],
            ['valeur_min' => 5001, 'valeur_max' => 20000, 'montant_frais' => 200, 'id_type_operation' => 3],
            ['valeur_min' => 20001, 'valeur_max' => 1000000, 'montant_frais' => 500, 'id_type_operation' => 3],
        ]);

        $this->db->table('utilisateur')->insertBatch([
            [
                'id' => 1,
                'nom' => 'Administrateur',
                'num_tel' => '0320000001',
                'role' => 'administrateur',
                'created_at' => '2026-07-20 08:00:00',
            ],
            [
                'id' => 2,
                'nom' => 'Alice Rakoto',
                'num_tel' => '0341234567',
                'role' => 'client',
                'created_at' => '2026-07-20 08:05:00',
            ],
            [
                'id' => 3,
                'nom' => 'Bob Razaf',
                'num_tel' => '0331234567',
                'role' => 'client',
                'created_at' => '2026-07-20 08:10:00',
            ],
            [
                'id' => 4,
                'nom' => 'Charlie Andry',
                'num_tel' => '0321234567',
                'role' => 'client',
                'created_at' => '2026-07-20 08:15:00',
            ],
        ]);

        $this->db->table('solde')->insertBatch([
            [
                'id' => 1,
                'id_utilisateur' => 2,
                'montant_dispo' => 250000,
                'date_maj' => '2026-07-20 09:00:00',
            ],
            [
                'id' => 2,
                'id_utilisateur' => 3,
                'montant_dispo' => 125000,
                'date_maj' => '2026-07-20 09:00:00',
            ],
            [
                'id' => 3,
                'id_utilisateur' => 4,
                'montant_dispo' => 50000,
                'date_maj' => '2026-07-20 09:00:00',
            ],
        ]);

        $this->db->table('historique')->insertBatch([
            [
                'id' => 1,
                'id_utilisateur' => 2,
                'montant' => 250000,
                'frais' => 0,
                'id_type_operation' => 1,
                'date_historique' => '2026-07-20 09:00:00',
            ],
            [
                'id' => 2,
                'id_utilisateur' => 3,
                'montant' => 125000,
                'frais' => 0,
                'id_type_operation' => 1,
                'date_historique' => '2026-07-20 09:15:00',
            ],
            [
                'id' => 3,
                'id_utilisateur' => 4,
                'montant' => 50000,
                'frais' => 0,
                'id_type_operation' => 1,
                'date_historique' => '2026-07-20 09:30:00',
            ],
            [
                'id' => 4,
                'id_utilisateur' => 2,
                'montant' => 30000,
                'frais' => 500,
                'id_type_operation' => 2,
                'date_historique' => '2026-07-20 10:00:00',
            ],
            [
                'id' => 5,
                'id_utilisateur' => 3,
                'montant' => 80000,
                'frais' => 1000,
                'id_type_operation' => 2,
                'date_historique' => '2026-07-20 10:30:00',
            ],
            [
                'id' => 6,
                'id_utilisateur' => 4,
                'montant' => 45000,
                'frais' => 300,
                'id_type_operation' => 3,
                'date_historique' => '2026-07-20 11:00:00',
            ],
        ]);

        $this->db->transComplete();
    }
}
