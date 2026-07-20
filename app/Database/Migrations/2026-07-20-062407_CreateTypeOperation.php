<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTypeOperation extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [ 'type' => 'INTEGER', 'constraint' => 11, 'auto_increment' => true, ],
            'nom' => [ 'type' => 'VACRHAR'],
        ]);

        $this->forge->addKey('id', true);

        $this->forge->createTable('type_operation');
    }

    public function down()
    {
        $this->forge->dropTable('type_operation');
    }
}
