<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEpargne extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'idUtilisateur'=> [ 'type'=> 'INTEGER'],
            'pourcentage' => [ 'type' => 'DECIMAL', 'constraint' => '5,2', 'null' => true ],
        'montant'=> [ 'type'=> 'INTEGER'],
            ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('epargne');
    }

    public function down()
    {
        $this->forge->dropTable('epargne');
    }
}
