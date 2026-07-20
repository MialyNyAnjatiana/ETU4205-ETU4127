<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFrais extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'valeur_min' => ['type' => 'DECIMAL'],
            'valeur_max' => ['type' => 'DECIMAL'],
            'montant_frais' => ['type' => 'DECIMAL'],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('frais');
    }

    public function down()
    {
        $this->forge->dropTable('frais');
    }
}
