<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSolde extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'id_utilisateur' => ['type' => 'INTEGER'],
            'montant_dispo' => ['type' => 'DECIMAL'],
            'date_maj' => ['type' => 'DATETIME', 'null' => true],
        ]);

        $this->forge->addForeignKey('id_utilisateur', 'utilisateur', 'id');

        $this->forge->addKey('id', true);

        $this->forge->createTable('solde');
    }

    public function down()
    {
        $this->forge->dropTable('solde');
    }
}
