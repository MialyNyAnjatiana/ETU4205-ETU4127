<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOperateurs extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'nom' => [ 'type' => 'VARCHAR'],
            'pourcentage_comission' => ['type' => 'DECIMAL', 'constraint' => '5,2'],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('operateur');
    }

    public function down()
    {
        $this->forge->dropTable('operateur');
    }
}
