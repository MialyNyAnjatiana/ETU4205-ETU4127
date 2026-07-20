<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUtilisateur extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true,],
            'nom' => ['type' => 'VARCHAR', 'constraint' => 100],
            'num_tel' => ['type' => 'VARCHAR', 'constraint' => 10],
            'role' => ['type' => 'VARCHAR', 'constraint' => 10, 'default' => 'client'],
            'created_at' => ['type' => 'DATETIME', 'null' => true,],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('utilisateur');
    }

    public function down()
    {
        $this->forge->dropTable('utilisateur');
    }
}
