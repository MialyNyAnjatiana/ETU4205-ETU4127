<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePrefixe extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'valeur' => [ 'type' => 'VACRHAR', 'constraint' => 3],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('prefixe');
    }

    public function down()
    {
        $this->forge->dropTable('prefixe');
    }
}
