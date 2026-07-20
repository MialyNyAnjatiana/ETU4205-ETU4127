<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateHistorique extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'id_utilisateur' => ['type' => 'INTEGER'],
            'id_destinataire' => ['type' => 'INTEGER', 'null' => true],
            'montant' => ['type' => 'DECIMAL'],
            'frais' => ['type' => 'DECIMAL'],
            'id_type_operation' => ['type' => 'INTEGER'],
            'date_historique' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id');
        $this->forge->addForeignKey('id_destinataire', 'utilisateur', 'id');

        $this->forge->addForeignKey('id_type_operation', 'type_operation', 'id');

        $this->forge->addKey('id', true);

        $this->forge->createTable('historique');
    }

    public function down()
    {
        $this->forge->dropTable('historique');
    }
}
